<div class="panel-body">
    <div class="form-horizontal">    
        <div class="row">
            <div class="col-md-8">
                @include('includes.info-box')
                
                <div class="form-group">
                    <label for="name" class="control-label col-md-3">Name</label>
                    <div class="col-md-8">
                        <input type="text" name="name" id="name" class="form-control" value="{{ Request::old('name') ? Request::old('name') : isset($contact) ? $contact->name : '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="company" class="control-label col-md-3">Company</label>
                    <div class="col-md-8">
                        <input type="text" name="company" id="company" class="form-control" value="{{ Request::old('company') ? Request::old('company') : isset($contact) ? $contact->company : '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-md-3">Email</label>
                    <div class="col-md-8">
                        <input type="text" name="email" id="email" class="form-control" value="{{ Request::old('email') ? Request::old('email') : isset($contact) ? $contact->email : '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="control-label col-md-3">Phone</label>
                    <div class="col-md-8">
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ Request::old('phone') ? Request::old('phone') : isset($contact) ? $contact->phone : '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="control-label col-md-3">Address</label>
                    <div class="col-md-8">
                        <textarea name="address" id="address" rows="3" class="form-control" value="hi">{{ Request::old('address') ? Request::old('address') : isset($contact) ? $contact->address : '' }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="group" class="control-label col-md-3">Group</label>
                    <div class="col-md-5">
                        <select name="group_id" id="group_id" class="form-control">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{ isset($contact) && $contact->group_id === $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <a href="#" id="add-group-btn" class="btn btn-default btn-block">Add Group</a>
                    </div>
                </div>
                <div class="form-group" id="add-new-group">
                    <div class="col-md-offset-3 col-md-8">
                        <div class="input-group">
                            <input type="text" name="new_group" id="new_group" class="form-control">
                            <span class="input-group-btn">
                                <a href="#" id="add-new-btn" class="btn btn-default">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                        <img src="{{ empty($contact->photo) ? 'http://placehold.it/150x150' : "../../uploads/{$contact->photo}"}}" alt="Photo">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div class="text-center">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Choose Photo</span>
                        <span class="fileinput-exists">Change</span><input type="file" name="photo"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-footer">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="#" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('form-script')
    <script>
        $("#add-new-group").hide();
        $('#add-group-btn').click(function () {      
            $("#add-new-group").slideToggle(function() {
                $('#new_group').focus();
            });
            return false;
        });

        $('#add-new-btn').on('click', function () {
            var newGroup = $('#new_group');

            $.ajax({
                url: "{{ route('groups.store') }}",
                method: 'post',
                data: {
                    name: $('#new_group').val(),
                    _token: $('input[name=_token]').val()
                },
                success: function(response) {
                    if (response.success == true) {
                        var inputGroup = newGroup.closest('.input-group');
    
                        inputGroup.removeClass('has-error');
                        inputGroup.next('.text-danger').remove();
                        
                        $('select[name=group_id]') 
                            .append($('<option></option>')
                            .attr('value', response.group.id)
                            .attr('selected', true)
                            .text(response.group.name));

                        newGroup.val('');
                    }
                },
                error: function(xhr, status, error) {
                    var error = JSON.parse(xhr.responseText);

                    if (error) {
                        var inputGroup = newGroup.closest('.input-group');
                            inputGroup.next('.text-danger').remove();
                            inputGroup.addClass('has-error')
                                .after('<p class="text-danger">' + error.errors.name[0] + '</p>');
                    }
                }
            });
        });
    </script>
@endsection