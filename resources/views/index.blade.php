@extends('layouts.app')
@section('content')
    <div class="dash-content">
        <div class="maintitlesec bluebg">
            <h1><img src="{{ asset('images/pot-icon.svg') }}" alt=""/> Sera Gazı Emisyonu Hesaplama</h1>
        </div>
        <div class="middlesection">
            <div class="container">
                <div class="formboxsec">
                    <form id="stationaryCombustionForm" method="post" action="">
                        <input type="text" name="id" id="calculation_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="formtitle">
                                    <h3>GİRDİ ALANI</h3>
                                    <p>Lütfen salınım değerlerini hesaplamak için aşağıdaki alanları doldurun:</p>
                                </div>
                                <div class="alaniform formmaxwid">
                                    <div class="mb-3">
                                        <label class="form-label">Tesis</label>
                                        <div class="selct-dropdown fullwidthselectbox selroundbox">
                                            <select id="facilities">
                                                <option value="">Tesis Seçiniz</option>
                                                @foreach($facilities as $facility)
                                                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Yıl</label>
                                        <div class="selct-dropdown fullwidthselectbox selroundbox">
                                            <select id="years">
                                                <option value="" selected>Yıl Seçiniz</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Yakıt Cinsi</label>
                                        <div class="selct-dropdown fullwidthselectbox selroundbox">
                                            <select id="fuel-types">
                                                <option value="" selected>Yakıt Cinsi Seçiniz</option>
                                                @foreach($fuelTypes as $fuelType)
                                                    <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Yakıt Miktarı</label>
                                        <div>
                                            <div class="selroundbox amountoffuelbox">
                                                <div class="inputselectflex">
                                                    <div class="griinput">
                                                        <input class="borinput" id="amount-of-fuel" type="number"
                                                               name="" placeholder="Giriniz">
                                                    </div>
                                                    <div class="selct-dropdown fullwidthselectbox">
                                                        <label class="form-label">Birimler</label>
                                                        <select id="fuel-units">
                                                            <option value="" selected>Yakıt Birimi Seçiniz
                                                            </option>
                                                            @foreach($fuelUnits as $fuelUnit)
                                                                <option
                                                                    value="{{ $fuelUnit->id }}">{{ $fuelUnit->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="rightformPL">
                                    <div class="formtitle">
                                        <h3>SONUÇ ALANI</h3>
                                        <p>Girdi Alanı'nda girdiğiniz değerlere göre salınan gaz miktarları
                                            aşağıdaki gibidir:</p>
                                    </div>
                                    <div class="sonucalaniformlist">
                                        <ul>
                                            <li>
                                                <div>
                                                    <span>CO<sub>2</sub></span>
                                                    <input type="text" name="" id="co2" placeholder="">
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <span>CH<sub>4</sub></span>
                                                    <input type="text" name="" id="ch4" placeholder="">
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <span>N<sub>2</sub>O</span>
                                                    <input type="text" name="" id="n2o" placeholder="">
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <span>CO<sub>2</sub><sup>e</sup></span>
                                                    <input type="text" name="" id="co2e" placeholder="">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sublinkbnt">
                                        <input type="button" id="resetDataConfirmBtn" name="Kaydet" value="Sıfırla">
                                        <input type="button" id="storeFormData" name="Kaydet" value="Kaydet">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="formtablesec">
                    <h4>Hesaplamalar</h4>
                    <div class="table-responsive fortab samwd">
                        <table id="storeDataTable"
                               class="table table-bordered cstmTable basicTable cusrmrTable tablehovetr">
                            <thead>
                            <tr>
                                <th class="smw fnt14">Facilty ID</th>
                                <th class="fnt14">Year</th>
                                <th class="fnt14">Fuel</th>
                                <th class="lefttext fnt14">Amount of <br>Fuel</th>
                                <th class="fnt14">Units</th>
                                <th class="fnt15"><span>CO<sub>2</sub></span></th>
                                <th class="fnt15"><span>CH<sub>4</sub></span></th>
                                <th class="fnt15"><span>N<sub>2</sub>O</span></th>
                                <th class="fnt15"><span>CO<sub>2</sub><sup>e</sup></span></th>
                                <th class="smw">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody class="boxr">
                            @foreach($calculations as $calculation)
                                <tr class="boxr" data-id="{{ $calculation->id }}">
                                    <td class="boxr">{{ $calculation->facility_id }}</td>
                                    <td>{{ $calculation->year }}</td>
                                    <td>{{ $calculation->fuel_type_id }}</td>
                                    <td>{{ $calculation->amount_of_fuel }}</td>
                                    <td>{{ $calculation->unit_id }}</td>
                                    <td>{{ $calculation->co2 }}</td>
                                    <td>{{ $calculation->ch4 }}</td>
                                    <td>{{ $calculation->n2o }}</td>
                                    <td>{{ $calculation->co2e }}</td>
                                    <td class="tableright smw">
                                        <a class="tabbtn remove" href="javascript:void(0)">Sil</a><br>
                                        <a class="tabbtn edit" href="javascript:void(0)">Düzenle</a><br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function checkFormValidation() {
            return !($('#facilities option:selected').val() === ""
                || $('#years option:selected').val() === ""
                || $('#fuel-types option:selected').val() === ""
                || $('#amount-of-fuel').val() === ""
                || $('#fuel-units option:selected').val() === "");
        }

        $("form :input").change(function () {
            if (checkFormValidation()) {
                submitForm();
            }
        });

        function submitForm() {
            $.post('{{ route('calculation.calculate') }}',
                {
                    "_token": "{{ csrf_token() }}",
                    facility_id: $('#facilities option:selected').val(),
                    fuel_type_id: $('#fuel-types option:selected').val(),
                    unit_id: $('#fuel-units option:selected').val(),
                    year: $('#years option:selected').val(),
                    amount_of_fuel: $('#amount-of-fuel').val(),
                },
                function (res, status) {
                    if (status === 'success') {
                        let data = res.data;
                        $('#co2').val(data.co2);
                        $('#ch4').val(data.ch4);
                        $('#n2o').val(data.n2o);
                        $('#co2e').val(data.co2e);
                    }
                });
        }


        $('#resetDataConfirmBtn').click(function () {
            $(".select-selected").text("");
            $("select").val("");
            $("input[type=text]").val("");
            $("input[type=number]").val("");
            $('#calculation_id').val("");
        })

        $('#storeFormData').click(function () {
            $.post('{{ route('calculation.store') }}',
                {
                    "_token": "{{ csrf_token() }}",
                    id: $('#calculation_id').val(),
                    facility_id: $('#facilities option:selected').val(),
                    fuel_type_id: $('#fuel-types option:selected').val(),
                    unit_id: $('#fuel-units option:selected').val(),
                    year: $('#years option:selected').val(),
                    amount_of_fuel: $('#amount-of-fuel').val(),
                },
                function (res, status) {
                    if (status === 'success') {
                        addRowToTable(res.data);
                    }
                });
        });

        function addRowToTable(data) {
            $('tbody').append(`
            <tr class="boxr" data-id="${data.id}">
               <td class="boxr">${data.facility_id}</td>
               <td>${data.year}</td>
               <td>${data.fuel_type_id}</td>
               <td>${data.amount_of_fuel}</td>
               <td>${data.unit_id}</td>
               <td>${data.co2}</td>
               <td>${data.ch4}</td>
               <td>${data.n2o}</td>
               <td>${data.co2e}</td>
               <td class="tableright smw">
                  <a class="tabbtn remove" href="javascript:void(0)">Sil</a><br>
                  <a class="tabbtn edit" href="javascript:void(0)">Düzenle</a><br>
               </td>
            </tr>
            `)
        }

        $('.tabbtn.remove').click(function () {
            let id = $(this).closest('.boxr').data("id");
            $.get('/delete/' + id, function (res, status) {
                if (status === 'success') {
                    $(`tr[data-id=${id}]`).remove();
                }
            });
        });

        $('.tabbtn.edit').click(function () {
            let id = $(this).closest('.boxr').data("id");
            $.get('/edit/' + id, function (res, status) {
                if (status === 'success') {
                    $('#calculation_id').val(res.data.id);
                    $('#facilities').val(res.data.facility_id);
                    $('#facilities').siblings('.select-selected').text( $('#facilities option[value='+res.data.facility_id+']').text());
                    $('#fuel-types').val(res.data.fuel_type_id);
                    $('#fuel-types').siblings('.select-selected').text( $('#fuel-types option[value='+res.data.fuel_type_id+']').text());
                    $('#fuel-units').val(res.data.unit_id);
                    $('#fuel-units').siblings('.select-selected').text( $('#fuel-units option[value='+res.data.unit_id+']').text());
                    $('#years').val(res.data.year);
                    $('#years').siblings('.select-selected').text( $('#years option[value='+res.data.year+']').text());
                    $('#amount-of-fuel').val(res.data.amount_of_fuel);
                    $('#co2').val(res.data.co2);
                    $('#ch4').val(res.data.ch4);
                    $('#n2o').val(res.data.n2o);
                    $('#co2e').val(res.data.co2e);
                }
            });
        });
    </script>
@endsection
