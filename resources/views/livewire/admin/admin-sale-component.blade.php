<div>
    <div class="container" style="padding: 30px 0 ;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-heading">
                    Configuracion oferta
                </div>
                <div class="panel body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-4">
                                <select class="form-control">
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">FEcha de oferta</label>
                            <div class="col-md-4">
                                <input type="text" id="sale_date" class="form-control" placeholder="YYYY/MM/DD H:M:S" />
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
    $(function()
    {
        $('#sale_date').datetimepicker({
        format: 'Y-MM-DD h:m:s',
        })
        .on('dp.change',function(ev){

        });
    });

</script>
@endpush
