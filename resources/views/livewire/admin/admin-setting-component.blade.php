<div>
    <div class="container" style="padding: 30px 0 ;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-heading">
                    Configuración
                </div>
                <div class="panel body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="saveSettings" >
                        <div class="form-group">
                            <label class="col-md-4 control-label">Correo</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" placeholder="email" wire:model="email" />
                                @error ('email')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Celular </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="celular" wire:model="phone" />
                                @error ('phone')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Celular 2</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="celular 2" wire:model="phone2" />
                                @error ('phone2')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Direccion" wire:model="address" />
                                @error ('address')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Mapa</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Mapa" wire:model="map" />
                                @error ('map')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Twitter</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Link de twitter" wire:model="twitter" />
                                @error ('twitter')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Facebook</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Link de Facebook" wire:model="facebook" />
                                @error ('facebook')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">YouTube</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Link de YouTube" wire:model="youtube" />
                                @error ('youtube')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>


</script>
@endpush
