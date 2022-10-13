<!-- BEGIN: Modal Content -->
<div id="create-user-modal" style="padding-top:18%" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add User</h2> 
                    <br>
                    <p class="lead">
                        Add a new user.
                    </p>
                </div> 
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input value="{{ old('name') }}" 
                                type="text" 
                                class="form-control" 
                                name="fname" 
                                placeholder="First Name" required>
        
                            @if ($errors->has('fname'))
                                <span class="text-danger text-left">{{ $errors->first('fname') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Last Name</label>
                            <input value="{{ old('name') }}" 
                                type="text" 
                                class="form-control" 
                                name="lname" 
                                placeholder="Last Name" required>
        
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('lname') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email') }}"
                                type="email" 
                                class="form-control" 
                                name="email" 
                                placeholder="Email address" required>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input value="{{ old('username') }}"
                                type="text" 
                                class="form-control" 
                                name="username" 
                                placeholder="Username" required>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>                
                        <div class="mb-3">
                            <label for="role" class="form-label">Assign Role</label>
                            <select class="form-control text-warning" 
                                name="role" required>
                                <option value="">Select role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ in_array($role->name, $userRole) 
                                            ? 'selected'
                                            : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                </div> 
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer"> 
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> 
                    <button type="submit" class="btn btn-primary w-30">Save User</button> 
                </div> <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div>