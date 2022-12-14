	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">Home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
                <form wire:submit.prevent="placeOrder" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Paso 1: Informacion</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">Nombres<span>*</span></label>
                                        <input type="text" name="firstname" value="" placeholder="Tus nombres" wire:model="firstname" >
                                        @error('firstname')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">Apellidos<span>*</span></label>
                                        <input type="text" name="lastname" value="" placeholder="Tus apellidos" wire:model="lastname" >
                                        @error('lastname')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Correo Electronico:</label>
                                        <input type="email" name="email" value="" placeholder="Correo de contacto" wire:model="email" >
                                        @error('email')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Numero de celular 1<span>*</span></label>
                                        <input type="number" name="mobile1" value="" placeholder="Numero de contacto" wire:model="mobile1" >
                                        @error('mobile1')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Numero de celular 2 (Opcional)</label>
                                        <input type="number" name="mobile2" value="" placeholder="Numero 2 de contacto" wire:model="mobile2" >
                                        @error('mobile2')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Departamento<span>*</span></label>
                                        {{-- <input type="text" name="country" value="" placeholder="San Martin" wire:model="departament" > --}}
                                        <select name="selectDepartamento" id="selectDepartamento" onchange="cambia()" class="form-control" required="" wire:model="departament">
                                            <option value="">Seleccione</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Ancash">Ancash</option>
                                            <option value="Apur??mac">Apur??mac</option>
                                            <option value="Arequipa">Arequipa</option>
                                            <option value="Ayacucho">Ayacucho</option>
                                            <option value="Cajamarca">Cajamarca</option>
                                            <option value="Callao">Callao</option>
                                            <option value="Cuzco">Cuzco </option>
                                            <option value="Huancavelica">Huancavelica</option>
                                            <option value="Hu??nuco">Hu??nuco</option>
                                            <option value="Ica">Ica</option>
                                            <option value="Jun??n">Jun??n</option>
                                            <option value="La_Libertad">La Libertad</option>
                                            <option value="Lambayeque">Lambayeque</option>
                                            <option value="Lima">Lima</option>
                                            <option value="Loreto">Loreto</option>
                                            <option value="Madre_de_Dios">Madre de Dios</option>
                                            <option value="Moquegua">Moquegua</option>
                                            <option value="Pasco">Pasco</option>
                                            <option value="Piura">Piura</option>
                                            <option value="Puno">Puno</option>
                                            <option value="San_Mart??n">San Mart??n</option>
                                            <option value="Tacna">Tacna</option>
                                            <option value="Tumbes">Tumbes</option>
                                            <option value="Ucayali">Ucayali</option>
                                        </select>
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Provincia<span>*</span></label>
                                        {{-- <input type="text" name="country" value="" placeholder="San Martin" wire:model="province" > --}}
                                        <select class="form-control" name="selectProvincia" id="selectProvincia" onchange="cambiaDistrito()" required="" wire:model="province">
                                            <option value="" >Seleccione la Provincia</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Ancash">Ancash</option>
                                            <option value="Apur??mac">Apur??mac</option>
                                            <option value="Arequipa">Arequipa</option>
                                            <option value="Ayacucho">Ayacucho</option>
                                            <option value="Cajamarca">Cajamarca</option>
                                            <option value="Callao">Callao</option>
                                            <option value="Cuzco">Cuzco </option>
                                            <option value="Huancavelica">Huancavelica</option>
                                            <option value="Hu??nuco">Hu??nuco</option>
                                        </select>
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Distrito<span>*</span></label>
                                        {{-- <input type="text" name="city" value="" placeholder="Tarapoto" wire:model="district" > --}}
                                        <select class="form-control" name="selectDistrito" id="selectDistrito" required="" wire:model="district">
                                            <option value="" >Seleccione el Distrito</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Ancash">Ancash</option>
                                            <option value="Apur??mac">Apur??mac</option>
                                            <option value="Arequipa">Arequipa</option>
                                            <option value="Ayacucho">Ayacucho</option>
                                            <option value="Cajamarca">Cajamarca</option>
                                            <option value="Callao">Callao</option>
                                            <option value="Cuzco">Cuzco </option>
                                            <option value="Huancavelica">Huancavelica</option>
                                            <option value="Hu??nuco">Hu??nuco</option>
                                        </select>
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Direcci??n:<span>*</span></label>
                                        <input type="text" name="address" placeholder="Jr. Tarapoto 850" wire:model="address" >
                                        @error('address')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Referencia:</label>
                                        <textarea class="form-control" name="reference" wire:model="reference"
                                        placeholder="Descripci??n de la fachada, puntos de referencia para encontrarla, indicaciones de seguridad, etc.">

                                        </textarea>
                                        @error('reference')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Codigo postal / ZIP:</label>
                                        <input type="number" name="zip" value="" placeholder="Codigo postal" wire:model="zip" >
                                        @error('zip')
                                            <span class="text-danger" >
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form fill-wife">
                                        <label class="checkbox-field">
                                            <input name="different-add" id="different-add" value="forever" type="checkbox" wire:model="ship_different" >
                                            <span>??Enviar a otra direccion?</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if($ship_different)
                            <div class="col-md-12">
                                <div class="wrap-address-billing">
                                    <h3 class="box-title">Direcci??n de envio</h3>
                                    <div class="billing-address">
                                        <p class="row-in-form">
                                            <label for="fname">Nombres<span>*</span></label>
                                            <input type="text" name="s_firstname" value="" placeholder="Tus nombres" wire:model="s_firstname" >
                                            @error('s_firstname')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="lname">Apellidos<span>*</span></label>
                                            <input type="text" name="s_lastname" value="" placeholder="Tus apellidos" wire:model="s_lastname" >
                                            @error('s_lastname')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="email">Correo Electronico:</label>
                                            <input type="email" name="s_email" value="" placeholder="Correo de contacto" wire:model="s_email" >
                                            @error('s_email')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="phone">Numero de celular 1<span>*</span></label>
                                            <input type="number" name="s_mobile1" value="" placeholder="Numero de contacto" wire:model="s_mobile1" >
                                            @error('s_mobile1')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="phone">Numero de celular 2 (Opcional)</label>
                                            <input type="number" name="s_mobile2" value="" placeholder="Numero 2 de contacto" wire:model="s_mobile2" >
                                            @error('s_mobile2')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="country">Departamento<span>*</span></label>
                                            {{-- <input type="text" name="country" value="" placeholder="San Martin" wire:model="departament" > --}}
                                            <select name="s_selectDepartamento" onchange="cambia()" class="form-control" required="" wire:model="s_departament">
                                                <option value="">Seleccione</option>
                                                <option value="Amazonas">Amazonas</option>
                                                <option value="Ancash">Ancash</option>
                                                <option value="Apur??mac">Apur??mac</option>
                                                <option value="Arequipa">Arequipa</option>
                                                <option value="Ayacucho">Ayacucho</option>
                                                <option value="Cajamarca">Cajamarca</option>
                                                <option value="Callao">Callao</option>
                                                <option value="Cuzco">Cuzco </option>
                                                <option value="Huancavelica">Huancavelica</option>
                                                <option value="Hu??nuco">Hu??nuco</option>
                                                <option value="Ica">Ica</option>
                                                <option value="Jun??n">Jun??n</option>
                                                <option value="La_Libertad">La Libertad</option>
                                                <option value="Lambayeque">Lambayeque</option>
                                                <option value="Lima">Lima</option>
                                                <option value="Loreto">Loreto</option>
                                                <option value="Madre_de_Dios">Madre de Dios</option>
                                                <option value="Moquegua">Moquegua</option>
                                                <option value="Pasco">Pasco</option>
                                                <option value="Piura">Piura</option>
                                                <option value="Puno">Puno</option>
                                                <option value="San_Mart??n">San Mart??n</option>
                                                <option value="Tacna">Tacna</option>
                                                <option value="Tumbes">Tumbes</option>
                                                <option value="Ucayali">Ucayali</option>
                                            </select>
                                        </p>
                                        <p class="row-in-form">
                                            <label for="country">Provincia<span>*</span></label>
                                            {{-- <input type="text" name="country" value="" placeholder="San Martin" wire:model="province" > --}}
                                            <select class="form-control" name="s_selectProvincia" onchange="cambiaDistrito()" required="" wire:model="s_province">
                                                <option value="" >Seleccione la Provincia</option>
                                                <option value="Amazonas">Amazonas</option>
                                                <option value="Ancash">Ancash</option>
                                                <option value="Apur??mac">Apur??mac</option>
                                                <option value="Arequipa">Arequipa</option>
                                                <option value="Ayacucho">Ayacucho</option>
                                                <option value="Cajamarca">Cajamarca</option>
                                                <option value="Callao">Callao</option>
                                                <option value="Cuzco">Cuzco </option>
                                                <option value="Huancavelica">Huancavelica</option>
                                                <option value="Hu??nuco">Hu??nuco</option>
                                            </select>
                                        </p>
                                        <p class="row-in-form">
                                            <label for="city">Distrito<span>*</span></label>
                                            {{-- <input type="text" name="city" value="" placeholder="Tarapoto" wire:model="district" > --}}
                                            <select class="form-control" name="s_selectDistrito" required="" wire:model="s_district">
                                                <option value="" >Seleccione el Distrito</option>
                                                <option value="Amazonas">Amazonas</option>
                                                <option value="Ancash">Ancash</option>
                                                <option value="Apur??mac">Apur??mac</option>
                                                <option value="Arequipa">Arequipa</option>
                                                <option value="Ayacucho">Ayacucho</option>
                                                <option value="Cajamarca">Cajamarca</option>
                                                <option value="Callao">Callao</option>
                                                <option value="Cuzco">Cuzco </option>
                                                <option value="Huancavelica">Huancavelica</option>
                                                <option value="Hu??nuco">Hu??nuco</option>
                                            </select>
                                        </p>
                                        <p class="row-in-form">
                                            <label for="add">Direcci??n:<span>*</span></label>
                                            <input type="text" name="s_address" placeholder="Jr. Tarapoto 850" wire:model="s_address" >
                                            @error('s_address')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="zip-code">Referencia:</label>
                                            <textarea class="form-control" name="s_reference" wire:model="s_reference"
                                            placeholder="Descripci??n de la fachada, puntos de referencia para encontrarla, indicaciones de seguridad, etc.">

                                            </textarea>
                                            @error('s_reference')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="row-in-form">
                                            <label for="zip-code">Codigo postal / ZIP:</label>
                                            <input type="number" name="s_zip" value="" placeholder="Codigo postal" wire:model="s_zip" >
                                            @error('s_zip')
                                                <span class="text-danger" >
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Paso 2: Metodos de pago</h4>
                            <p class="summary-info"><span class="title">Check / Money order</span></p>
                            <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                                    <span>Pagar contra entrega</span>
                                    <span class="payment-desc">Reciba el producto y pague.</span>
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-bank" value="visa" type="radio" wire:model="paymentmode">
                                    <span>Pagar con Visa</span>
                                    <span class="payment-desc">Pague con su tarjeta de debito/credito.</span>
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-visa" value="banca" type="radio" wire:model="paymentmode">
                                    <span>Banca por internet</span>
                                    <span class="payment-desc">BCP, Interbank, BBVA</span>
                                </label>
                                @error('paymentmode')
                                    <span class="text-danger" >
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            @if (Session::has('checkout'))
                                <p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">S/ {{Session::get('checkout')['total']}}</span></p>
                            @endif
                            <button type="submit" class="btn btn-medium">
                                Comprar ahora
                            </button>
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Motodos de envio</h4>
                            <p class="summary-info"><span class="title">Tarifa plana</span></p>
                            <p class="summary-info"><span class="title">Fijo S/ 0</span></p>
                        </div>
				    </div>
                </form>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>

    @push('scripts')
        {{-- <script>

            // function alerta(){
            //     var sel_departamento = document.getElementsByName("selectDepartamento")[0];
            //     selectDepartamento = sel_departamento.options[sel_departamento.selectedIndex].value;
            //     alert(selectDepartamento)
            // }

            function cambia(){

            var sel_departamento = document.getElementsByName("selectDepartamento")[0];
            var sel_provincia = document.getElementsByName("selectProvincia")[0];
            var sel_distrito = document.getElementsByName("selectDistrito")[0];

            var opt_Amazonas = new Array ("Seleccione la Provincia", "Bagua", "Bongar??", "Chachapoyas", "Condorcanqui","Luya","Rodr??guez de Mendoza","Utcubamba");
            var opt_Amazonas_value = new Array ("Seleccione la Provincia", "Bagua", "Bongar??", "Chachapoyas", "Condorcanqui","Luya","Rodr??guez_de_Mendoza","Utcubamba");

            var opt_Ancash = new Array ("Seleccione la Provincia", "Aija", "Antonio Raymondi", "Asunci??n", "Bolognesi","Carhuaz","Carlos Ferm??n Fitzcarrald","Casma","Corongo","Huaraz","Huari","Huarmey","Huaylas","Mariscal Luzuriaga","Ocros","Pallasca","Pomabamba","Recuay","Santa","Sihuas","Yungay");
            var opt_Ancash_value = new Array ("Seleccione la Provincia", "Aija", "Antonio_Raymondi", "Asunci??n", "Bolognesi","Carhuaz","Carlos_Ferm??n_Fitzcarrald","Casma","Corongo","Huaraz","Huari","Huarmey","Huaylas","Mariscal_Luzuriaga","Ocros","Pallasca","Pomabamba","Recuay","Santa","Sihuas","Yungay");

            var opt_Apur??mac = new Array ("Seleccione la Provincia", "Abancay", "Andahuaylas", "Antabamba", "Aymaraes","Cotabambas","Chincheros","Grau");
            var opt_Apur??mac_value = new Array ("Seleccione la Provincia", "Abancay", "Andahuaylas", "Antabamba", "Aymaraes","Cotabambas","Chincheros","Grau");

            var opt_Arequipa = new Array ("Seleccione la Provincia", "Arequipa", "Caman??", "Caravel??", "Castilla","Caylloma","Condesuyos","Islay","La Uni??n");
            var opt_Arequipa_value = new Array ("Seleccione la Provincia", "Arequipa", "Caman??", "Caravel??", "Castilla","Caylloma","Condesuyos","Islay","La_Uni??n");

            var opt_Ayacucho = new Array ("Seleccione la Provincia", "Cangallo","Huamanga","Huanca Sancos", "Huanta","La Mar","Lucanas","Parinacochas","P??ucar del Sara Sara","Sucre","V??ctor Fajardo","Vilcashuam??n");
            var opt_Ayacucho_value = new Array ("Seleccione la Provincia", "Cangallo","Huamanga","Huanca_Sancos", "Huanta","La_Mar","Lucanas","Parinacochas","P??ucar_del_Sara_Sara","Sucre","V??ctor_Fajardo","Vilcashuam??n");

            var opt_Cajamarca = new Array ("Seleccione la Provincia", "Cajabamba","Cajamarca ","Celend??n", "Contumaz??","Cutervo","Chota","Hualgayoc","Ja??n","Santa Cruz","San Miguel","San Ignacio","San Marcos","San Pablo");
            var opt_Cajamarca_value = new Array ("Seleccione la Provincia", "Cajabamba","Cajamarca ","Celend??n", "Contumaz??","Cutervo","Chota","Hualgayoc","Ja??n","Santa_Cruz","San_Miguel","San_Ignacio","San_Marcos","San_Pablo");

            var opt_Callao = new Array ("Seleccione la Provincia", "Callao");
            var opt_Callao_value = new Array ("Seleccione la Provincia", "Callao");

            var opt_Cuzco = new Array ("Seleccione la Provincia", "Acomayo","Anta ","Calca", "Canas","Canchis","Chumbivilcas","Cuzco","Espinar","La Convenci??n","Paruro","Paucartambo","Quispicanchi","Urubamba");
            var opt_Cuzco_value = new Array ("Seleccione la Provincia", "Acomayo","Anta ","Calca", "Canas","Canchis","Chumbivilcas","Cuzco","Espinar","La_Convenci??n","Paruro","Paucartambo","Quispicanchi","Urubamba");

            var opt_Huancavelica = new Array ("Seleccione la Provincia", "Acobamba","Angaraes ","Castrovirreyna", "Churcampa","Huancavelica","Huaytar??","Tayacaja");
            var opt_Huancavelica_value = new Array ("Seleccione la Provincia", "Acobamba","Angaraes ","Castrovirreyna", "Churcampa","Huancavelica","Huaytar??","Tayacaja");

            var opt_Hu??nuco = new Array ("Seleccione la Provincia", "Ambo","Dos de Mayo","Huacaybamba", "Hu??nuco","Huamal??es","Leoncio Prado","Mara????n","Pachitea","Puerto Inca","Lauricocha","Yarowilca");
            var opt_Hu??nuco_value = new Array ("Seleccione la Provincia", "Ambo","Dos_de_Mayo","Huacaybamba", "Hu??nuco","Huamal??es","Leoncio_Prado","Mara????n","Pachitea","Puerto_Inca","Lauricocha","Yarowilca");

            var opt_Ica = new Array ("Seleccione la Provincia","Chincha","Ica","Nazca","Palpa","Pisco");
            var opt_Ica_value = new Array ("Seleccione la Provincia","Chincha","Ica","Nazca","Palpa","Pisco");

            var opt_Jun??n = new Array ("Seleccione la Provincia", "Concepci??n","Chanchamayo","Chupaca","Huancayo","Jauja","Jun??n","Satipo","Tarma","Yauli");
            var opt_Jun??n_value = new Array ("Seleccione la Provincia", "Concepci??n","Chanchamayo","Chupaca","Huancayo","Jauja","Jun??n","Satipo","Tarma","Yauli");

            var opt_La_Libertad= new Array ("Seleccione la Provincia", "Ascope","Bol??var","Chep??n","Gran Chim??","Julc??n","Otuzco","Pacasmayo","Pataz","S??nchez Carri??n","Santiago de Chuco","Trujillo","Vir??");
            var opt_La_Libertad_value= new Array ("Seleccione la Provincia","Ascope","Bol??var","Chep??n","Gran_Chim??","Julc??n","Otuzco","Pacasmayo","Pataz","S??nchez_Carri??n","Santiago_de_Chuco","Trujillo","Vir??");

            var opt_Lambayeque= new Array ("Seleccione la Provincia", "Chiclayo","Ferre??afe","Lambayeque");
            var opt_Lambayeque_value= new Array ("Seleccione la Provincia", "Chiclayo","Ferre??afe","Lambayeque");

            var opt_Lima= new Array ("Seleccione la Provincia","Barranca","Cajatambo","Canta","Ca??ete","Huaral","Huarochir??","Huaura","Lima","Oy??n","Yauyos");
            var opt_Lima_value= new Array ("Seleccione la Provincia","Barranca","Cajatambo","Canta","Ca??ete","Huaral","Huarochir??","Huaura","Lima","Oy??n","Yauyos");

            var opt_Loreto= new Array ("Seleccione la Provincia","Alto Amazonas","Datem del Mara????n","Loreto","Maynas","Mariscal Ram??n Castilla","Putumayo","Requena","Ucayali");
            var opt_Loreto_value= new Array ("-","Alto_Amazonas","Datem_del_Mara????n","Loreto","Maynas","Mariscal_Ram??n_Castilla","Putumayo","Requena","Ucayali");

            var opt_Madre_de_Dios=new Array("Seleccione Provincia","Manu","Tambopata","Tahuamanu");
            var opt_Madre_de_Dios_value=new Array("Seleccione Provincia","Manu","Tambopata","Tahuamanu");

            var opt_Moquegua=new Array("Seleccione Provincia","General S??nchez Cerro","Ilo","Mariscal Nieto");
            var opt_Moquegua_value=new Array("Seleccione Provincia","General_S??nchez_Cerro","Ilo","Mariscal_Nieto");

            var opt_Pasco=new Array("Seleccione Provincia","Daniel Alcides Carri??n","Oxapampa","Pasco");
            var opt_Pasco_value=new Array("Seleccione Provincia","Daniel_Alcides_Carri??n","Oxapampa","Pasco");

            var opt_Piura=new Array("Seleccione Provincia","Ayabaca","Huancabamba","Morrop??n","Paita","Piura","Sechura","Sullana","Talara");
            var opt_Piura_value=new Array("Seleccione Provincia","Ayabaca","Huancabamba","Morrop??n","Paita","Piura","Sechura","Sullana","Talara");

            var opt_Puno=new Array("Seleccione Provincia","Az??ngaro","Carabaya","Chucuito","El Collao","Huancan??","Lampa","Melgar","Moho","Puno","San Antonio de Putina","San Rom??n","Sandia","Yunguyo");
            var opt_Puno_value=new Array("Seleccione Provincia","Az??ngaro","Carabaya","Chucuito","El_Collao","Huancan??","Lampa","Melgar","Moho","Puno","San_Antonio_de_Putina","San_Rom??n","Sandia","Yunguyo");

            var opt_San_Mart??n=new Array("Seleccione Provincia","Bellavista","El Dorado","Huallaga","Lamas","Mariscal C??ceres","Moyobamba","Picota","Rioja","San Mart??n","Tocache");
            var opt_San_Mart??n_value=new Array("Seleccione Provincia","Bellavista","El_Dorado","Huallaga","Lamas","Mariscal_C??ceres","Moyobamba","Picota","Rioja","San_Mart??n","Tocache");

            var opt_Tacna=new Array("Seleccione Provincia","Candarave","Jorge Basadre","Tacna","Tarata");
            var opt_Tacna_value=new Array("Seleccione Provincia","Candarave","Jorge_Basadre","Tacna","Tarata");

            var opt_Tumbes=new Array("Seleccione Provincia","Contralmirante Villar","Tumbes","Zarumilla");
            var opt_Tumbes_value=new Array("Seleccione Provincia","Contralmirante_Villar","Tumbes","Zarumilla");

            var opt_Ucayali=new Array("Seleccione Provincia","Atalaya","Coronel Portillo","Padre Abad","Pur??s");
            var opt_Ucayali_value=new Array("Seleccione Provincia","Atalaya","Coronel_Portillo","Padre_Abad","Pur??s");


            var cosa;

            selectDepartamento = sel_departamento.options[sel_departamento.selectedIndex].value;

            if(selectDepartamento!=0){
                mis_opts=eval("opt_" + selectDepartamento);
                mis_value=eval("opt_" + selectDepartamento +"_value");
                //alert(selectDepartamento);
                num_opts=mis_opts.length;

                sel_provincia.length = num_opts;

                for(i=0; i<num_opts; i++){

                    sel_provincia.options[0].value="";
                    sel_provincia.options[0].text="Seleccione la Provincia 1";

                    sel_provincia.options[i].value=mis_value[i];
                    sel_provincia.options[i].text=mis_opts[i];
                    // alert(sel_provincia.options[i].text=mis_opts[i])

                }

                sel_distrito.length = 1;
                sel_distrito.options[0].value=" ";
                sel_distrito.options[0].text="Seleccione el Distrito";


            }else{
                sel_provincia.length = 1;
                sel_provincia.options[0].value="";
                sel_provincia.options[0].text="Seleccione la Provinciano";
            }
                sel_provincia.options[0].selected = true;
                sel_distrito.options[0].selected = true;
            }


            var opt_Bagua = new Array ("Seleccione el Distrito","Aramago", "Bagua", "Copall??n", "Chiriaco","El Parco","La Peca");
            var opt_Bongar?? = new Array ("Seleccione el Distrito","Chisquilla","Churuja","Corosha","Cuipes","Florida","Jaz??n","Jumbilla","Recta","San Carlos","Shipasbamba","Valera","Yambrasbamba");
            var opt_Chachapoyas = new Array ("Seleccione el Distrito","Asunsi??n","Balsas","Chachapoyas","Cheto","Chiliqu??n","Chuquibamba","Granada","Huancas","La Jalca","Leimebamba","Levanto","Magdalena","Mariscal Castilla","Molinopampa","Montevideo","Olleros","Quinjalca","San Francisco de Daguas","San Isidro de Maino","Soloco","Sonche");
            var opt_Condorcanqui =new Array ("Seleccione el Distrito","El Cenepa","Nieva","R??o Santiago");
            var opt_Luya = new Array ("Seleccione el Distrito","Camporredondo","Cocabamba","Colcamar","Conila","Inguilpata","L??mud","Longuita","Lonya Chico","Luya","Luya Viejo","Mar??a","Ocalli","Ocumal","Pisuqu??a","Providencia","San Crist??bal","San Francisco del Yeso","San Jer??nimo","San Juan de Lopecancha","Santa Catalina","Santo Tom??s","Tingo","Trita");
            var opt_Rodr??guez_de_Mendoza = new Array ("Seleccione el Distrito","San Nicol??s","Chirimoto","Cochamal","Huambo","Limababa","Longar","Mariscal Benavides","Milpuc","Omia","Santa Rosa","Totora","Vista Alegre");
            var opt_Utcubamba = new Array ("Seleccione el Distrito","Bagua Grande","Cajaruro","Cumba","El Milagro","Jamalca","Lonya Grande","Yam??n");

            var opt_Aija =new Array ("Seleccione el Distrito","Aija","Coris","Huacll??n","La Merced","Succha");
            var opt_Antonio_Raymondi = new Array ("Seleccione el Distrito","Llamell??n","Aczo","Chaccho","Chingas","Mirgas","San Juan de Rontoy");
            var opt_Asunci??n =new Array("Seleccione el Distrito","Chacas","Acochaca");
            var opt_Bolognesi =new Array("Seleccione el Distrito","Abelardo Pardo","Antonio Raymondi","Aquia","Cajatay","Canis","Chiqui??n","C??lquioc","Huallanca","Huasta","Huayllacay??n","La Primavera","Mangas","Pacll??n","San Miguel","Ticllos");
            var opt_Carhuaz =new Array("Seleccione el Distrito","Acopampa","Amashca","Anta","Ataquero","Carhuaz","Marcar??","Pariahuanca","San Miguel de Aco","Shilla","Tinco","Yungar");
            var opt_Carlos_Ferm??n_Fitzcarrald =new Array("Seleccione el Distrito","San Luis","San Nicol??s","Yauya");
            var opt_Casma =new Array("Seleccione el Distrito","Buenavista","Casma","Comandante Noel","Yaut??n");
            var opt_Corongo =new Array("Seleccione el Distrito","Aco","Bambas","Corongo","Cusca","La Pampa","Y??nac","Yup??n");
            var opt_Huaraz =new Array("Seleccione el Distrito","Cochabamba","Colcabamba","Huanchay","Huaraz","Indepedencia","Jangas","La Libertad","Olleros","Pampas Grande","Pariacoto","Pira","Tarica");
            var opt_Huari =new Array("Seleccione el Distrito","Anra","Cajay","Chav??n de Hu??ntar","Huacachi","Huacchis","Huachis","Hu??ntar","Huari","Masin","Paucas","Pont??","Rahuapampa","Rapay??n","San Marcos","San Pedro de Chan??","Uco");
            var opt_Huarmey =new Array("Seleccione el Distrito","Cochapeti","Culebras","Huarmey","Huayan","Malvas");
            var opt_Huaylas =new Array("Seleccione el Distrito","Caraz","Huallanca","Huanta","Huaylas","Mato","Pamparom??s","Pueblo Libre","Santa Cruz","Santo Toribio","Yuracmarca");
            var opt_Mariscal_Luzuriaga =new Array("Seleccione el Distrito","Casca","Eleazar Guzm??n Barr??n","Fidel Olivas Escudero","Llama","Llumpa","Lucma","Musga","Piscobamba");
            var opt_Ocros =new Array("Seleccione el Distrito","Acas","Cajamarquilla","Carhuapampa","Cochas","Congas","Llipa","Ocros","San Crist??bal de Raj??n","San Pedro","Santiago de Chilcas");
            var opt_Pallasca =new Array("Seleccione el Distrito","Bolognesi","Cabana","Conchucos","Huacaschuque","Huandoval","Lacabamba","Llapo","Pallasca","Pampas","Santa Rosa","Tauca");
            var opt_Pomabamba =new Array("Seleccione el Distrito","Huayll??n","Parobamba","Pomabamba","Quinuabamba");
            var opt_Recuay =new Array("Seleccione el Distrito","Catac","Cotaparaco","Huayllapampa","Llacll??n","Marca","Pampas Chico","Parar??n","Recuay","Tapacocha","Ticapampa");
            var opt_Santa =new Array("Seleccione el Distrito","C??ceres del Per??","Chimbote","Coishco","Macate","Moro","Nepe??a","Nuevo Chimbote","Samanco","Santa");
            var opt_Sihuas =new Array("Seleccione el Distrito","Acobamba","Alfonso Ugarte","Cashapampa","Chingalpo","Huayllabamba","Quiches","Ragash","San Juan","Sicsibamba","Sihuas");
            var opt_Yungay =new Array("Seleccione el Distrito","Cascapara","Mancos","Matacoto","Quillo","Ranrahirca","Shupluy","Yanama","Yungay");

            var opt_Abancay = new Array ("Seleccione el Distrito", "Abancay", "Chacoche", "Circa", "Curahuasi","Huanipaca","Lambrama","Pichirhua","San Pedro de Cachora","Tamburco");
            var opt_Andahuaylas = new Array ("Seleccione el Distrito", "Andahuaylas", "Adarapa", "Chiara", "Huancarama","Huancaray","Huayana","Jos?? Mar??a Arguedas","Kiquiabamba","Kishuara","Pacobamba","Pacucha","Pampachiri","Pamacocha","San Antonio de Cachi","San Jer??nimo","San Miguel de Chaccrapampa","Santa Mar??a de Chicmo","Talavera de la Reyna","Tumay Huaraca","Turpo");
            var opt_Antabamba = new Array ("Seleccione el Distrito","Antabamba","El Oro","Huaquirca","Juan Espinoza Medrano","Oropesa","Pachaconas","Sabaino");
            var opt_Aymaraes = new Array ("Seleccione el Distrito","Capaya","Caraybamba","Chalhuanca","Chapimarca","Colcabamba","Cotaruse","Ihuayllo","Justo Apu Sahuaraura","Lucre","Pocohuanca","San Juan de Chac??a","Sa??ayca","Soraya","Tapayrihua","Tintay","Toraya","Yanaca");
            var opt_Cotabambas = new Array ("Seleccione el Distrito","Chalhuahuachos","Cotabambas","Coyllurqui","Haquira","Mara","Tambobamba");
            var opt_Chincheros = new Array ("Seleccione el Distrito","Anccohuayllo","Chincheros","Cocharcas","Huaccana","Ocobamba","Ongoy","Uranmarca","Ranracancha","Rocchac","El Porvenir","Los Chanckas");
            var opt_Grau = new Array ("Seleccione el Distrito","Chuquibambilla","Curasco","Curpahuasi","Huayllati","Mamara","Mariscal Gamarra","Micaela Bastidas","Pataypampa","Progreso","San Antonio","Santa Rosa","Turpay","Vilcabamba","Virundo");

            var opt_Arequipa = new Array ("Seleccione el Distrito","Alto Selva Alegre","Arequipa","Cayma","Cerro Colorado","Characato","Chiguata","Jacobo Hunter","Jos?? Luis Bustamante y Rivero","La Joya","Mariano Melgar","Miraflores","Mollebamba","Paucarpata","Pocsi","Polobaya","Queque??a","Saband??a","Sachaca","San Juan de Siguas","San Juan de Tarucani","Santa Isabel de Siguas","Santa Rita de Siguas","Socabaya","Tiabaya","Uchumayo","Vitor","Yanahuara","Yarabamba","Yura");
            var opt_Caman?? = new Array ("Seleccione el Distrito","Caman??","Jos?? Mar??a Quimper","Mariano Nicol??s Valcarcel","Mariscal C??ceres","Nicol??s de Pi??rola","Oco??a","Quilca","Samuel Pastor");
            var opt_Caravel?? = new Array ("Seleccione el Distrito","Acar??","Atico","Atiquipa","Bella Uni??n","Cahuacho","Caravel??","Chala","Ch??parra","Huanuhuanu","Jaqui","Lomas","Quicacha","Yauca");
            var opt_Castilla = new Array ("Seleccione el Distrito","Andara","Aplao","Ayo","Chachas","Chilcaymarca","Choco","Huancarqui","Mochaguay","Orcopampa","Pampacolca","Tip??n","U????n","Uraca","Viraco");
            var opt_Caylloma = new Array ("Seleccione el Distrito","Achoma","Cabanaconde","Callalli","Caylloma","Chivay","Coporaque","Huambo","Huanca","Ichupampa","Lari","Lluta","Maca","Madrigal","Majes","San Antonio de Chuca","Sibayo","Tapay","Tisco","Tuti","Yanque");
            var opt_Condesuyos = new Array ("Seleccione el Distrito","Andaray","Cayarani","Chichas","Chuquibamba","Iray","Rio Grande","Salamanca","Yanaquihua");
            var opt_Islay = new Array ("Seleccione el Distrito","Cacachacra","De??n Valdivia","Islay","Mej??a","Mollendo","Punta de Bomb??n");
            var opt_La_Uni??n = new Array ("Seleccione el Distrito","Alca","Charcana","Cotahuasi","Huaynacotas","Pampamarca","Puyca","Quechualla","Sayla","Taur??a","Tomepampa","Toro");

            var opt_Cangallo = new Array ("Seleccione el Distrito","Cangallo","Chuschi","Los Morochucos","Mar??a Parado de Bellido","Paras","Totos");
            var opt_Huamanga = new Array ("Seleccione el Distrito","Acocro","Acos Vinchos","Andr??s Avelino C??ceres Dorregaray","Ayacucho","Carmen Alto","Chiara","Jes??s Nazareno","Ocros","Pacaycasa","Quinua","San Jos?? de Ticllas","San Juan Bautista","Santiago de Pischa","Socos","Tambillo","Vinchos");
            var opt_Huanca_Sancos = new Array ("Seleccione el Distrito","Carapo","Sacsamarca","Sancos","Santiago de Lucanamarca");
            var opt_Huanta = new Array ("Seleccione el Distrito","Ayahuanco","Huamanguilla","Huanta","Igua??n","Llochegua","Luricocha","Santillana","Sivia","Canayre","Uchuraccay","Pucacolpa","Chaca");
            var opt_La_Mar = new Array ("Seleccione el Distrito","Anchihuay","Anco","Ayna","Chilcas","Chungui","Luis Carranza","Oronccoy","San Miguel","Santa Rosa","Sumugari","Tambo");
            var opt_Lucanas = new Array ("Seleccione el Distrito","Aucara","Cabana Sur","Carmen Salcedo","Chavi??a","Chipao","Huacuas","Laramate","Leoncio Prado","Llauta","Lucanas","Oca??a","Otoca","Puquio","Saisa","San Crist??bal","San Juan","San Pedro","San Pedro de Palco","Sancos","Santa Ana de Huaycahuacho","Santa Luc??a");
            var opt_Parinacochas = new Array ("Seleccione el Distrito","Coracora","Chumpi","Coronel Casta??eda","Pacapausa","Pullo","Puyasca","San Francisco de Ravacayco","Upahuacho");
            var opt_P??ucar_del_Sara_Sara = new Array ("Seleccione el Distrito","Colta","Corculla","Lampa","Marcabamba","Oyolo","Pararca","Pauza","San Javier de Alpabamba","San Jos?? de Ushua","Sara Sara");
            var opt_Sucre = new Array ("Seleccione el Distrito","Bel??n","Chalcos","Chilcayoc","Huaca??a","Morcolla","Paico","Querobamba","San Pedro de Larcay","San Salvador de Quije","Santiago de Paucaray","Soras");
            var opt_V??ctor_Fajardo = new Array ("Seleccione el Distrito","Alcamenca","Apongo","Asquipata","Canaria","Cayana","Colca","Huamanquiquia","Huancapi","Huancaraylla","Huaya","Sahua","Vilcanchos");
            var opt_Vilcashuam??n = new Array ("Seleccione el Distrito","Accomarca","Carhuanca","Concepci??n","Huambalpa","Independencia","Saurama","Vilvashuam??n","Vischongo");

            var opt_Cajabamba = new Array ("Seleccione el Distrito","Cachachi","Cajabamba","Condebamba","Sitacocha");
            var opt_Cajamarca = new Array ("Seleccione el Distrito","Asunsi??n","Cajamarca","Chetilla","Cosp??n","Jes??s","LLacanora","La Enca??ada","Los Ba??os del Inca","Magdalena","Matara","Nomora","San Juan");
            var opt_Celend??n = new Array ("Seleccione el Distrito","Celend??n","Chumuch","Cortegana","Huasmin","Jorge Ch??vez","Jos?? Galvez","La Libertad de Pall??n","Miguel Iglesias","Oxamarca","Sorochuco","Sucre","Utco");
            var opt_Contumaz?? = new Array ("Seleccione el Distrito","Chilete","Contumaz??","Cupisnique","Guzmango","San Benito","Santa Cruz de Toledo","Tantarica","Yon??n");
            var opt_Cutervo = new Array ("Seleccione el Distrito","Callayuc","Choros","Cujillo","Cutervo","La Ramada","<Pinpin></Pinpin>gos","Querocotillo","San Andr??s de Cutervo","San Juan de Cutervo","San Luis de Lucma","Santa Cruz","Santo Domingo de la Capilla","Santo Tom??s","Socota","Toribio Casanova");
            var opt_Chota = new Array ("Seleccione el Distrito","Angu??a","Chad??n","Chalamarca","Chiguirip","Chimban","Choropampa","Chota","Cochabamba","Conch??n","Huambos","Lajas","Llama","Miracosta","Paccha","Pion","Querocoto","San Juan de Licupis","Tacabamba","Tocmoche");
            var opt_Hualgayoc = new Array ("Seleccione el Distrito","Bambamarca","Chugur","Hualgayoc");
            var opt_Ja??n = new Array ("Seleccione el Distrito","Bellavista","Chontal??","Colasay","Huabal","Ja??n","Las Pirias","Pomahuanca","Pucar??","Sallique","San Felipe","San Jos?? del Alto","Santa Rosa");
            var opt_Santa_Cruz = new Array ("Seleccione el Distrito","Andabamba","Catache","Chancayba??os","La Esperanza","Ninabamba","Pul??n","Santa Cruz","Saucepampa","Sexi","Uticyacu","Yauyucan","Idima");
            var opt_San_Miguel = new Array ("Seleccione el Distrito","Bol??var","Calquis","Catilluc","El Prado","La Florida","Llapa","Nanchoc","Niepos","San Gregorio","San Miguel","San Silvestre de Conch??n","Tongod","Uni??n Agua Blanca");
            var opt_San_Ignacio = new Array ("Seleccione el Distrito","Chirinos","Huarango","La Coipa","Namballe","San Ignacio","San Jos?? de Lourdes","Tabaconas");
            var opt_San_Marcos = new Array ("Seleccione el Distrito","Chancay","Eduardo Villanueva","Gregorio Pita","Ichoc??n","Jose Manuel Quiroz","Jos?? Sagobal","Pedro G??lvez");
            var opt_San_Pablo = new Array ("Seleccione el Distrito","San Bernardino","San Luis","San Pablo","Tumbaden");

            var opt_Callao = new Array ("Seleccione el Distrito", "Bellavista","Callao","Carmen de la Legua","La Perla","La Punta","Ventanilla","Mi Per??");

            var opt_Acomayo = new Array ("Seleccione el Distrito","Acomayo","Acopia","Acos","Mosoc Llacta","Pomacanchi","Rondocan","Sangarar??");
            var opt_Anta = new Array ("Seleccione el Distrito","Anta","Ancahuasi","Cachimayo","Chinchaypujio","Huarocondo","Limatambo","Mollepata","Pucyura","Zurite");
            var opt_Calca = new Array ("Seleccione el Distrito","Calca","Coya","Lamay","Lares","Pisac","San Salvador","Taray","Yanatile");
            var opt_Canas = new Array ("Seleccione el Distrito","Checca","Kunturkanki","Langui","Layo","Pampamarca","Quehue","T??pac Amaru","Yanaoca");
            var opt_Canchis = new Array ("Seleccione el Distrito","Checacupe","Combapata","Marangani","Pitumarca","San Pablo","San Pedro","Sicuani","Tinta");
            var opt_Chumbivilcas = new Array ("Seleccione el Distrito","Ccapacmarca","Chamaca","Colquemarca","Livitaca","Llusco","Qui??ota","Santo Tom??s","Valille");
            var opt_Cuzco = new Array ("Seleccione el Distrito","Ccorca","Cuzco","Poroy","San Jer??nimo","San Sebasti??n","Santiago","Saylla","Wanchaq");
            var opt_Espinar = new Array ("Seleccione el Distrito","Alto Pichigua","Condoroma","Coporaque","Ocoruro","Pallpata","Pichigua","Suyckutambo","Yauri");
            var opt_La_Convenci??n = new Array ("Seleccione el Distrito","Echarati","Huayopata","Inkawasi","Kimbiri","Maranura","Megantoni","Ocobamba","Pachari","Quellouno","Santa Ana","Santa Teresa","Vilcabamba","Villa Kintiarina","Villa Virgen");
            var opt_Paruro = new Array ("Seleccione el Distrito","Accha","Ccapi","Colcha","Huanoquite","Omacha","Paccaritambo","Paruro","Pillpinto","Yaurisque");
            var opt_Paucartambo = new Array ("Seleccione el Distrito","Caicay","Challabamba","Colquepata","Huancarani","Kos??ipata","Paucartambo");
            var opt_Quispicanchi = new Array ("Seleccione el Distrito","Andahuaylillas","Camanti","Ccarhuayo","Ccatca","Cusipata","Huaro","Lucre","Marcapata","Ocongate","Oropesa","Quiquijana","Urcos");
            var opt_Urubamba = new Array ("Seleccione el Distrito","Chinchero","Huayllabamba","Machupicchu","Maras","Ollantaytambo","Urubamba","Yucay");

            var opt_Acobamba = new Array ("Seleccione el Distrito","Acobamba","Andabamba","Anta","Caja","Marcas","Paucar??","Pomacocha","Rosario");
            var opt_Angaraes = new Array ("Seleccione el Distrito","Anchonga","Callanmarca","Ccochaccasa","Chincho","Congalla","Huanca Huanca","Huayllay Grande","Julcamarca","Lircay","San Antonio de Antaparco","Santo Tom??s de Pata","Secila");
            var opt_Castrovirreyna = new Array ("Seleccione el Distrito","Arma","Aurahu??","Capillas","Castrovirreyna","Chupamarca","Cocas","Huachos","Huamatambo","Mollepampa","San Juan","Santa Ana","Tantara","Ticrapo");
            var opt_Churcampa = new Array ("Seleccione el Distrito","Anco","Chinchihuasi","Churcampa","Cosme","El Carmen","La Merced","Locroja","Pachamarca","Paucarbamba","San Miguel de Mayocc","San Pedro de Coris");
            var opt_Huancavelica = new Array ("Seleccione el Distrito","Acobambilla","Acoria","Ascensi??n","Conayca","Cuenca","Huachocolpa","Huando","Huancavelica","Huayllahuara","Izcuchaca","Laria","Manta","Mariscal C??ceres","Moya","Nuevo Occoro","Palca","Pilchaca","Vilva","Yauli");
            var opt_Huaytar?? = new Array ("Seleccione el Distrito","Ayav??","C??rdoba","Huayacundo Arma","Huaytar??","Laramarca","Ocoyo","Pilpichaca","Querco","Quito-Arma","San Antonio de Cusicancha","San Francisco de Sangayaico","San Isisdro","Santiago de Chocorvos","Santiago de Quirahuara","Santo Domingo de Capillas","Tambo");
            var opt_Tayacaja = new Array ("Seleccione el Distrito","Acostambo","Acraqu??a","Ahuaycha","Andaymarca","Colcabamba","Daniel Hern??ndez","Huachocolpa","Huaribamba","??ahuimpuquio","Pampas","Pazos","Pichos","Roble","Quichuas","Quishuar","Salcabamba","Salcahuasi","San Marcos de Rocchac","Santiago de Tucuma","Surcubamba","Tintay Puncu");

            var opt_Ambo = new Array ("Seleccione el Distrito","Ambo","Cayna","Colpas","Conchamarca","Hu??car","San Francisco","San Rafael","Tomay Kichwa");
            var opt_Dos_de_Mayo = new Array ("Seleccione el Distrito","Chuquis","La Uni??n","Mar??as","Pachas","Quivilla","Rip??n","Shunqui","Sillapata","Yanas");
            var opt_Huacaybamba = new Array ("Seleccione el Distrito","Canchabamba","Cochabamba","Huacaybamba","Pinra");
            var opt_Hu??nuco = new Array ("Seleccione el Distrito","Amarillis","Chinchao","Churumbamba","Hu??nuco","Margos","Pillco Marca","Quisqui","San Francisco de Cayr??n","San Pablo de Pillao","San Pedro de Chaul??n","Santa Mar??a del Valle","Yurimayo","Yacus");
            var opt_Huamal??es = new Array ("Seleccione el Distrito","Arancay","Chav??n de Pariarca","Jacas Grande","Jircan","Llata","Miraflores","Monz??n","Punchao","Pu??os","Singa","Tantamayo");
            var opt_Leoncio_Prado = new Array ("Seleccione el Distrito","Castillo Grande","Danie Alom??a Robles ","Hermilio Valdiz??n","Jos?? Crespo y Castillo","Luyando","Mariano D??maso Bera??n","Pucayacu","Pueblo Nuevo","Rupa-Rupa","Santo Domingo de Anda");
            var opt_Mara????n = new Array ("Seleccione el Distrito","Chol??n","Huacrachuco","La Morada","San Buenaventura","Santa Rosa de Alto Yanajanca");
            var opt_Pachitea = new Array ("Seleccione el Distrito","Chaglla","Molino","Panao","Umari");
            var opt_Puerto_Inca = new Array ("Seleccione el Distrito","Codo del Pozuzo","Honoria","Puerto Inca","Tournavista","Yayapichis");
            var opt_Lauricocha = new Array ("Seleccione el Distrito","Ba??os","Jes??s","Jivia","Queropalca","Rondos","San Francisco de As??s","San Miguel de Cauri");
            var opt_Yarowilca = new Array ("Seleccione el Distrito","Aparicio Pomares","Cahuac","Chacabamba","Chavinillo","Choras","Jacas Chico","Obas","Pampamarca");

            var opt_Chincha = new Array ("Seleccione el Distrito","Alto Lar??n","Chav??n","Chincha Alta","Chincha Baja","El Carmen","Grocio Prado","Pueblo Nuevo","San Juan de Yanac","San Pedro de Huacarpana","Sunampe","Tambo de Mora");
            var opt_Ica = new Array ("Seleccione el Distrito","Ica","La Tingui??a","Los Aquijes","Ocucaje","Pachac??tec","Parcona","Pueblo Nuevo","Salas","San Jos?? de los Molinos","San Juan Bautista","Santiago","Subtanjalla","Tate","Yauca del Rosario");
            var opt_Nazca = new Array ("Seleccione el Distrito","Changuillo","El Ingenio","Marcona","Nazca","Vista Elegre");
            var opt_Palpa = new Array ("Seleccione el Distrito","Llipata","Palpa","R??o Grande","Santa Cruz","Tibillo");
            var opt_Pisco = new Array ("Seleccione el Distrito","Huancano","Huay","Independencia","Paracas","Pisco","San Andr??s","San Clemente","T??pac Amaru Inca");

            var opt_Concepci??n = new Array ("Seleccione el Distrito","Aco","Andamarca","Chambara","Cochas","Comas","Concepci??n","Hero??nas Toledo","Manzanares","Mariscal Castilla","Matahuasi","Mito","Nueve de Julio","Orcotuna","San Jos?? de Quero","Santa Rosa de Ocopa");
            var opt_Chanchamayo = new Array ("Seleccione el Distrito","La Merced","San Luis","Peren??","Pichanaqui","San Ram??n","V??toc");
            var opt_Chupaca = new Array ("Seleccione el Distrito","??huac","Chongos Bajo","Chupaca","Hu??chac","Huamancaca Chico","San Juan de Yscos","San Juan de Jarpa","Tres de Diciembre","Yanacancha");
            var opt_Huancayo = new Array ("Seleccione el Distrito","Carhuacallanga","Chacapampa","Chicche","Chilca","Chongos Alto","Chupuro","Colca","Cullhuas","El Tambo","Huancayo","Huacrapuquio","Hualhuas","Huanc??n","Huasicancha","Huayucachi","Ingenio","Pariahuanca","Pilcomayo","Pucar??","Quichuay","Quilcas","San Agust??n de Cajas","San Jer??nimo de Tun??n","San Pedro de Sa??o","Santo Domingo de Acobamba","Sapallanga","Sicaya","Viques");
            var opt_Jauja = new Array ("Seleccione el Distrito","Acolla","Apata","Ataura","Canchayllo","Curicaca","El Mantaro","Huamal??","Huaripampa","Huertas","Janjaillo","Jauja","Julc??n","Leonor Ord????ez","Llocllapampa","Marco","Masma","Masma Chicche","Molinos","Monobamba","Muqui","Muquiyauyo","Paca","Paccha","Panc??n","Parco","Pomacancha","Ricr??n","San Lorenzo","San Pedro de Chun??n","Sausa","Sincos","Tunanmarca","Yauli","Yauyos");
            var opt_Jun??n = new Array ("Seleccione el Distrito","Carhuamayo","Ondores","Jun??n","Ulcumayo");
            var opt_Satipo = new Array ("Seleccione el Distrito","Covirial??","Llaylla","Mazamari","Pampa Hermosa","Pangoa","R??o Negro","R??o Tambo","Satipo","Vizcat??n del Ene");
            var opt_Tarma = new Array ("Seleccione el Distrito","Acobamba","Huaricolca","Huasahuasi","La Uni??n","Palca","Palcamayo","San Pedro de Cajas","Tapo","Tarma");
            var opt_Yauli = new Array ("Seleccione el Distrito","Chacapalta","Huayhuay","La Oroya","Marcapomacocha","Morococha","Paccha","Santa Barbara de Carhuacay??n","Santa Rosa de Sacco","Suitucancha","Yauli");

            var opt_Ascope = new Array ("Seleccione el Distrito","Ascope","Casa Grande","Chicama","Chocope","Magdalena de Cao","Paij??n","R??zuri","Santiago de Cao");
            var opt_Bol??var = new Array ("Seleccione el Distrito","Bol??var","Bambamarca","Condormarca","Longotea","Uchumarca","Ucuncha");
            var opt_Chep??n = new Array ("Seleccione el Distrito","Chep??n","Pacanga","Pueblo Nuevo");
            var opt_Julc??n = new Array ("Seleccione el Distrito","Calamarca","Carabamba","Huaso","Julc??n");
            var opt_Gran_Chim?? = new Array ("Seleccione el Distrito","Cascas","Lucma","Marmot","Sayapullo");
            var opt_Otuzco = new Array ("Seleccione el Distrito","Agallpampa","Charat","Huaranchal","La Cuesta","Mache","Otuzco","Paranday","Salpo","Sinsicap","Usquil");
            var opt_Pacasmayo = new Array ("Seleccione el Distrito","Guadalupe","Jequetepeque","Pacasmayo","San Jos??","San Pedro de Lloc");
            var opt_Pataz = new Array ("Seleccione el Distrito","Buldibuyo","Chilia","Huancaspata","Huaylillas","Huayo","Ong??n","Parcoy","Pataz","P??as","Santiago de Challas","Taurija","Tayabamba","Urpay");
            var opt_S??nchez_Carri??n = new Array ("Seleccione el Distrito","Chugay","Cochorco","Curgos","Huamachuco","Marcabal","Sanagor??n","Sar??n","Sartimbamba");
            var opt_Santiago_de_Chuco = new Array ("Seleccione el Distrito","Angasmarca","Cachicad??n","Mollebamba","Mollepata","Quiruvilca","Santa Cruz de Chuca","Santiago de Chuco","Sitabamba");
            var opt_Trujillo = new Array ("Seleccione el Distrito","El Porvenir","Florencia de Mora","Huanchaco","La Esperanza","Laredo","Moche","Poroto","Salaverry","Simbal","Trujillo","V??ctor Larco Herrera");
            var opt_Vir?? = new Array ("Seleccione el Distrito","Chao","Guadalupito","Vir??");

            var opt_Chiclayo= new Array ("Seleccione el Distrito","Cayalt??","Chiclayo","Chongoyape","Eten","Puerto Eten","Jos?? Leonardo Ortiz","La Victoria","Lagunas","Monsef??","Nueva Arica","Oyot??n","P??tapo","Picsi","Pimentel","Pomalca","Pucal??","Reque","Santa Rosa","Tum??n","Za??a");
            var opt_Ferre??afe= new Array ("Seleccione el Distrito","Ca??aris","Ferre??afe","Incahuasi","Manuel Antonio Mesones Muro","P??tipo","Pueblo Nuevo");
            var opt_Lambayeque= new Array ("Seleccione el Distrito","Ch??chope","??llimo","Jayanca","Lambayeque","Mochum??","M??rrope","Motupe","Olmos","Pacora","Salas","San Jos??","T??cume");

            var opt_Barranca= new Array ("Seleccione el Distrito","Barranca","Paramonga","Pativilca","Supe","Supe Puerto");
            var opt_Cajatambo= new Array ("Seleccione el Distrito","Gorgor","Huancap??n","Cajatambo","Copa","Man??s");
            var opt_Canta= new Array ("Seleccione el Distrito","Arahuay","Canta","Huamantanga","Huaros","Lachaqui","San Buenaventura","Santa Rosa de Quives");
            var opt_Ca??ete= new Array ("Seleccione el Distrito","Asia","Calango","Cerro Azul","Chilca","Coayllo","Imperial","Lunahuan??","Mala","Nuevo Imperial","Pacar??n","Quilman??","San Antonio","San Luis","San Vicente de Ca??ete","Santa Cruz de Flores","Z????iga");
            var opt_Huaral= new Array ("Seleccione el Distrito","Atavillos Alto","Atavillo","Aucallama","Chancay","Huaral","Ihuar??","Lamp??an","Pacaraos","Santa Cruz de Andama","Sumbilca","San Miguel de Acos","Veintisiete de noviembre");
            var opt_Huarochir??= new Array ("Seleccione el Distrito","Antioqu??a","Callahuanca","Carampoma","Chicla","Cuenca","Huachupampa","Huanza","Huarochir??","Lahuaytambo","Langa","Laraos","Mariatana","Matucana","Ricardo Palma","San Andr??s de Tupicocha","San Antonio","San Bartolom??","San Dami??n","San Juan de Iris","San Juan de Tantaranche","San Lorenzo de Quinti","San Mateo","San Mateo de Otao","San Pedro de Casta","San Pedro de Huancayre","Sangallaya","Santa Cruz de Cocachacra","Santa Eulalia","Santiago de Anchucaya","Santiago de Tuna","Santo Domingo de los Olleros","San Jer??nimo de Surco");
            var opt_Huaura= new Array ("Seleccione el Distrito","??mbar","Caleta De Carqu??n","Checras","Huacho","Hualmay","Huaura","Leoncio Prado","Paccho","Santa Leonor","Santa Mar??a","Say??n","Vegueta");
            var opt_Lima= new Array ("Seleccione el Distrito","Anc??n","Ate","Barranco","Bra??a","Carabayllo","Chaclacayo","Chorrillos","Cieneguilla","Comas","El Agustino","Independencia","Ses??s Mar??a","La Molina","La Victor??a","Lima","Lince","Los Olivos","Lurigancho-Chosica","Lurin","Magdalena de Mar","Miraflores","Pueblo Libre","Pachac??mac","Pucusana","Puente Piedra","Punta Hermosa","Punta Negra","R??mac","San Bartolo","San Borja","San Isidro","San Juan de Lurigancho","San Juan de Miraflores","San Luis","San Mart??n de Porres","San Miguel","Santa Anita","Santa Mar??a del Mar","Santa Rosa","Santiago de Surco","Surquillo","Villa el salvador","Villa Mar??a del Triunfo");
            var opt_Oy??n= new Array ("Seleccione el Distrito","Andajes","Caujul","Cochamarca","Nav??n","Oy??n","Pachangara");
            var opt_Yauyos= new Array ("Seleccione el Distrito","Alis","Ayauca","Ayavir??","Az??ngaro","Cacra","Carania","Catahuasi","Chocos","Cochas","Colonia","Hongos","Huampara","Huancaya","Huang??scar","Huant??n","Hua??ec","Laraos","Lincha","Madean","Miraflores","Omas","Quinches","Quinocay","San Lorenzo de Putinza","San Joaquin","San Pedro de Pilas","Tanta","Tauripampa","Tomas","Tupe","Vi??ac","Vitis","Yauyos");

            var opt_Alto_Amazonas= new Array ("Seleccione el Distrito","Balsapuerto","Jaberos","Lagunas","Santa Cruz","Teniente C??sar L??pez Rojas","Yurimaguas");
            var opt_Datem_del_Mara????n= new Array ("Seleccione el Distrito","Barranca","Cahuapanas","Manseriche","Morona","Pastaza","Andoas");
            var opt_Loreto= new Array ("Seleccione el Distrito","Nauta","Parinari","Tigre","Trompeteros","Urarinas");
            var opt_Maynas= new Array ("Seleccione el Distrito","Alto Nanay","Fernando Lores","Indiana","Iquitos","Las Amazonas","Maz??n","Napo","Punchana","Torres Causana","Bel??n","San Juan Bautista");
            var opt_Mariscal_Ram??n_Castilla= new Array ("Seleccione el Distrito","Pebas","Ram??n Castilla","San Pablo","Yavar??");
            var opt_Putumayo= new Array ("Seleccione el Distrito","Putumayo","Rosa Panduro","Yaguas","Teniente Manuel Clavero");
            var opt_Requena= new Array ("Seleccione el Distrito","Alto Tapiche","Capelo","Emilio San Mart??n","Maqu??a","Puinahua","Requena","Saquena","Soplin","Tapiche","Jenaro Herrera","Yaquerana");
            var opt_Ucayali= new Array ("Seleccione el Distrito","Contamana","Inahuaya","Padre M??rquez","Pampa Hermosa","Sarayacu","Alfredo Vargas Guerra");

            var opt_Manu= new Array ("Seleccione el Distrito","Fitzcarrald","Madre de Dios","Manu","Huepetuhe");
            var opt_Tambopata= new Array ("Seleccione el Distrito","Inambari","Las Piedras","Laberinto","Tambopata");
            var opt_Tahuamanu= new Array ("Seleccione el Distrito","Iberia","I??apari","Tahuamanu");

            var opt_General_S??nchez_Cerro= new Array ("Seleccione el Distrito","Chojata","Coalaque","Ichu??a","La Capilla","Lloque","Matalaque","Omate","Puquina","Quinistaquillas","Ubinas","Yunga");
            var opt_Ilo= new Array ("Seleccione el Distrito","El Algarrobal","Ilo","Pacocha");
            var opt_Mariscal_Nieto= new Array ("Seleccione el Distrito","Carumas","Cuchumbaya","Moquegua","Samegua","San Crist??bal de Calacoa","Torata");

            var opt_Daniel_Alcides_Carri??n= new Array ("Seleccione el Distrito","Chacat??n","Goyllarisquizga","Paucar","San Pedro de Pillao","Santa Ana de Tusi","Tapuc","Vilvabamba","Yanahuanca");
            var opt_Oxapampa= new Array ("Seleccione el Distrito","Chontabamba","Constituci??n","Huancabamba","Oxapampa","Palcazu","Pozuzo","Puerto Berm??dez","Villa Rica");
            var opt_Pasco= new Array ("Seleccione el Distrito","Chaupimarca","Huach??n","Huariaca","Huayllay","Ninacaca","Pallanchacra","Paucartambo","San Francisco de Asis de Yarusyac??n","Sim??n Bol??var","Ticlacay??n","Tinyahuarco","Vicco","Yanacancha");

            var opt_Ayabaca= new Array ("Seleccione el Distrito","Ayabaca","Fr??as","Jilil??","Lagunas","Montero","Pacaipampa","Paimas","Sapillica","Sincchez","Suyo");
            var opt_Huancabamba= new Array ("Seleccione el Distrito","Canchaque","El Carmen de la Frontera","Huancabamba","Huarmaca","Lalaquiz","San Miguel de El Faique","S??ndor","Sondorillo");
            var opt_Morrop??n= new Array ("Seleccione el Distrito","Buenos Aires","Chalaco","Chulucanas","La Matanza","Morrop??n","Salitral","San Juan de Bigote","Santa Catalina de Mossa","Santo Domngo","Yamango");
            var opt_Paita= new Array ("Seleccione el Distrito","Amotape","Col??n","El Arenal","La Huaca","Paita","Tamarindo","Vichayal");
            var opt_Piura= new Array ("Seleccione el Distrito","Castilla","Catacaos","Cura Mori","El Tall??n","La Arena","La uni??n","Las Lomas","Piura","Tambogrande","26 de Octubre");
            var opt_Sechura= new Array ("Seleccione el Distrito","Bellavista de la Uni??n","Bernal","Cristo nos Valga","Rinconada-Llicuar","Sechura","Vice");
            var opt_Sullana= new Array ("Seleccione el Distrito","Bellavista","Marcavelica","Salitral","Sullana","Querecotillo","Lancones","Ignacion Esdudero","Miguel Checa");
            var opt_Talara= new Array ("Seleccione el Distrito","El Alto","La Brea","Lobitos","Los ??rganos","M??ncora","Pira??as");

            var opt_Az??ngaro= new Array ("Seleccione el Distrito","Achaya","Arapa","Asilo","Az??ngaro","Caminaca","Chupa","Jos?? Domingo Choquehuanca","Mu??ani","Potoni","Sam??n","San Ant??n","San Jos??","San Juan de Salinas","Santiago de Pupuja","Tirapata");
            var opt_Carabaya= new Array ("Seleccione el Distrito","Ajoyani","Ayapata","Coasa","Corani","Crucero","Ituata","Macusani","Ollachea","San Gab??n","Usicayos");
            var opt_Chucuito= new Array ("Seleccione el Distrito","Desaguadero","Huacullani","Juli","Kelluyo","Pisacoma","Pomata","Zepita");
            var opt_El_Collao= new Array ("Seleccione el Distrito","Capaso","Conduriri","Ilave","Pilcuyo","Santa Rosa");
            var opt_Huancan??= new Array ("Seleccione el Distrito","Huancan??","Pusi","Vilque Chico","Taraco","Huatasani");
            var opt_Lampa= new Array ("Seleccione el Distrito","Cabanilla","Calapuja","Lampa","Nicasio","Ocuviri","Palca","Parat??a","Pucar??","Santa Luc??a","Vilavila");
            var opt_Melgar= new Array ("Seleccione el Distrito","Antauta","Ayaviri","Cupi","Llalli","Macari","??u??oa","Orurillo","Santa Rosa","Umachiri");
            var opt_Moho= new Array ("Seleccione el Distrito","Conima","Huayrapata","Moho","Tilali");
            var opt_Puno= new Array ("Seleccione el Distrito","??cora","Amantan??","Atuncolla","Capachica","Chucuito","Coata","Huata","Ma??azo","Paucarcolla","Pichacani","Plater??a","Puno","San Antonio","Tiquillaca","Vilque");
            var opt_San_Antonio_de_Putina= new Array ("Seleccione el Distrito","Ananea","Pedro Vilca Apaza","Putina","Quilcapuncu","Sina");
            var opt_San_Rom??n= new Array ("Seleccione el Distrito","Cabana","Cabanillas","Caracoto","Juliaca","San Miguel");
            var opt_Sandia= new Array ("Seleccione el Distrito","Alto Inambari","Cuyocuyo","Limbani","Patamburco","Phara","Quiaca","San Juan del Oro","San Pedro de Putinapunco","Sandia","Yanahuaya");
            var opt_Yunguyo= new Array ("Seleccione el Distrito","Anapia","Copani","Cuturapi","Ollaraya","Tinacachi","Unicachi","Yunguyo");

            var opt_Bellavista= new Array ("Seleccione el Distrito","Alto Biavo","Bajo Biavo","Bellavista","Huallaga","San Pablo","San Rafael");
            var opt_El_Dorado= new Array ("Seleccione el Distrito","Agua Blanca","San Jos?? de Sisa","San Mart??n","Santa Rosa","Shatoja");
            var opt_Huallaga= new Array ("Seleccione el Distrito","Alto Saposoa","El Eslab??n","Piscoyacu","Sacanche","Saposoa","Tingo de Saposoa");
            var opt_Lamas= new Array ("Seleccione el Distrito","Alonso de Alvarado","Barranquita","Caynarachi","Cu??unbuqui","Lamas","Pinto Recodo","Rumisapa","San Roque de Cumbaza","Shanao","Tabalosos","Zapatero");
            var opt_Mariscal_C??ceres= new Array ("Seleccione el Distrito","Campanilla","Costa Rica","Dos de Mayo","Huicungo","Juanju??","Juanjuicillo","La Merced","Pachiza","Pajarillo");
            var opt_Moyobamba= new Array ("Seleccione el Distrito","Calzada","Habana","Jepelacio","Moyobamba","Soritor","Yantalo");
            var opt_Picota= new Array ("Seleccione el Distrito","Buenos Aires","Caspizapa","Picota","Pilluana","Pucacaca","San Crist??nal","San Hilarion","Shamboyacu","Tingo se Ponanza","Tres Unidos");
            var opt_Rioja= new Array ("Seleccione el Distrito","Awaj??n","Elias Soplin Vargas","Nueva Cajamarca","Pardo Miguel","Posic","Rioja","San Fernando","Yorongos","Yuracyacu");
            var opt_San_Mart??n= new Array ("Seleccione el Distrito","Alberto Leveau","Cacatachi","Chazuta","Chipurana","El Porvenir","Huimbayoc","Juan Guerra","La Banda de Shilcayo","Morales","Papaplaya","San Antonio","Sauce","Shapaja","Tarapoto");
            var opt_Tocache= new Array ("Seleccione el Distrito","Nuevo Progreso","P??lvora","Shunte","Tocache","Uchiza");

            var opt_Candarave= new Array ("Seleccione el Distrito","Cairari","Camilaca","Candarave","Curibaya","Huanuara","Quilahuani");
            var opt_Jorge_Basadre= new Array ("Seleccione el Distrito","Ilabaya","Ite","Locumba");
            var opt_Tacna= new Array ("Seleccione el Distrito","Alto de la Alianza","Calana","Ciudad Nueva","Coronel Gregorio Albarrac??n Lanchipa","Incl??n","La Yarada-Los Palos","Pach??a","Palca","Pocollay","Sama","Tacna");
            var opt_Tarata= new Array ("Seleccione el Distrito","Estique","Estique Pampa","Her??es Albarrac??n","Sitajara","Susapaya","Tarata","Tarucachi","Ticaco");

            var opt_Contralmirante_Villar= new Array ("Seleccione el Distrito","Canoas de Punta Sal","Casitas","Zorritos");
            var opt_Tumbes= new Array ("Seleccione el Distrito","Corrales","La Cruz","Pampas de Hospital","San Jacinto","San Juan de la Virgen","Tumbes");
            var opt_Zarumilla= new Array ("Seleccione el Distrito","Aguas Verdes","Matapalo","Papayal","Zarumilla");

            var opt_Atalaya= new Array ("Seleccione el Distrito","Raimondi","Sepahua","Tahuan??a","Yur??a");
            var opt_Coronel_Portillo= new Array ("Seleccione el Distrito","Caller??a","Campoverde","Ipar??a","Masisea","Yarinacocha","Nueva Requena","Manantay");
            var opt_Padre_Abad= new Array ("Seleccione el Distrito","Alexander von Humboldt","Curiman??","Ir??zola","Neshuya","Padre Abad");
            var opt_Pur??s= new Array ("Seleccione el Distrito","Pur??s");


            function cambiaDistrito()
            {
                var cosa;
                var sel_departamento = document.getElementsByName("selectDepartamento")[0];
                var sel_provincia = document.getElementsByName("selectProvincia")[0];
                var sel_distrito = document.getElementsByName("selectDistrito")[0];

                selectProvincia = sel_provincia.options[sel_provincia.selectedIndex].value;

            if(selectProvincia!=0)
            {
            mis_opts=eval("opt_" + selectProvincia);
            num_opts=mis_opts.length;

            sel_distrito.length = num_opts;

            for(i=0; i<num_opts; i++)
            {
            sel_distrito.options[0].value="";
            sel_distrito.options[0].text="Seleccione el Distrito";

            sel_distrito.options[i].value=mis_opts[i];
            sel_distrito.options[i].text=mis_opts[i];
            }
            }
            else
            {
            sel_distrito.length = 1;
            sel_distrito.options[0].value="-";
            sel_distrito.options[0].text="-";
            }
            sel_distrito.options[0].selected = true;
            }
        </script> --}}
    @endpush
