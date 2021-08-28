
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
                <form action="" >
                    <div class="mb-3">
                        <label for="nameOfService" class="form-label">Szolgáltatás neve</label>
                        <input type="text" class="form-control" id="nameOfService" name="nameOfService">
                        <label for="priceOfService" class="form-label">Szolgáltatás ára</label>
                        <input type="text" class="form-control" id="priceOfService" name="priceOfService">
                        <label for="durationOfService" class="form-label">Szolgáltatás időtartama</label>
                        <input type="text" class="form-control" id="durationOfService" name="durationOfService">
                        <label for="mainService" class="form-label">Szolgáltatáshoz tartozó főkategória</label>
                        <input type="text" class="form-control" id="mainService" name="mainService">
                    </div>
                    <button type="button" class="btn btn-primary" id="subServiceSave">Mentés</button>
                </form>
    
            <div id="result"></div>

        </div>
        <div class="col"></div>
    </div>

    <script src="../../Resources/js/Admin/index.js"></script>