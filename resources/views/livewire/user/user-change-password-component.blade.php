<div>
    <div class="container"  style="padding: 30px 0;" >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cambiar la contraseña
                    </div>
                    <div class="panel-body">
                        @if(Session::has('password_success'))
                            <div class="alert alert-success" role="alert">{{Session::get('password_success')}}</div>
                        @endif
                        @if(Session::has('password_error'))
                            <div class="alert alert-success" role="alert">{{Session::get('password_error')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="changePassword" >
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contraseña actual</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" placeholder="Contraseña" name="current_password" wire:model="current_password" />
                                    @error('current_password')
                                        <p class="text-danger" >
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contraseña nueva</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" placeholder="Contraseña" name="password" wire:model="password" />
                                    @error('password')
                                        <p class="text-danger" >
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirmar Contraseña</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" placeholder="Contraseña" name="password_confirmation" wire:model="password_confirmation" />
                                    @error('password_confirmation')
                                        <p class="text-danger" >
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contraseña actual</label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
