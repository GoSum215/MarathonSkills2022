@extends('layouts.app')

@section('title')
    Калькуляторы
@endsection

@section('link_style')
    <link href="{{ asset('../css/calculator.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('../css/calculator_mobile.css') }}" rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <script>
        function result1(){
            let height = document.getElementById('id_height').value;
            let weight = document.getElementById('id_weight').value;
            let result = Number(weight)/((Number(height)/100)**2);
            if(result > 0 && result < 18.5){
                document.getElementById('description_text').textContent = "Ваш индекс массы тела: " + result.toFixed(1) +". Данное значение ИМТ соответствует: Недостаточной массе тела";
            }
            else if(result >= 18.5 && result <= 24.9){
                document.getElementById('description_text').textContent = "Ваш индекс массы тела: " + result.toFixed(1) +". Данное значение ИМТ соответствует: Нормальному весу";

            }
            else if(result >= 25 && result <= 29.9){
                document.getElementById('description_text').textContent = "Ваш индекс массы тела: " + result.toFixed(1) +". Данное значение ИМТ соответствует: Избыточному весу";

            }
            else if(result >= 30 && result <= 34.9){
                document.getElementById('description_text').textContent = "Ваш индекс массы тела: " + result.toFixed(1) +". Данное значение ИМТ соответствует: Ожирению 1-й степени";

            }
            else if(result >= 35 && result <= 39.9){
                document.getElementById('description_text').textContent = "Ваш индекс массы тела: " + result.toFixed(1) +". Данное значение ИМТ соответствует: Ожирению 2-й степени";

            }
            else if(result >= 40){
                document.getElementById('description_text').textContent = "Ваш индекс массы тела: " + result.toFixed(1) +". Данное значение ИМТ соответствует: Ожирению 3-й степени";

            }
            else{
                document.getElementById('description_text').textContent = "Введите корректные данные";
            }
        }

        function result2(){
            let height = Number(document.getElementById('height2').value);
            let weight = Number(document.getElementById('weight2').value);
            let age = Number(document.getElementById('age2').value);

            let father = document.getElementById('activ');
            let dother = father.getElementsByTagName('input');
            let activity = 0;

            for(var i = 0; i<dother.length; i++){
                if(dother[i].checked){
                    activity = Number(dother[i].value);
                }
            }

            father = document.getElementById('gend');
            dother = father.getElementsByTagName('input');
            let gender = 0;

            for(var i = 0; i<dother.length; i++){
                if(dother[i].checked){
                    gender = Number(dother[i].value);
                }
            }

            let result = -1;
            if(gender == 0){
                result = (66.5 + (13.75 * weight) + (5.003 * height) - (6.775 * age)) * activity;
            }
            else{
                result = (665.1 + (9.563 * weight) + (1.85 * height) - (4.676 * age)) * activity;
            }

            document.getElementById("inf").textContent = " Для поддержания веса организму требуется: " + Math.ceil(result) +" ккал в день"
        }
    </script>

    <div class="flex_block">
        <div class="first_main_block">
            <div class="description">Калькулятор индекса массы тела</div>

            <div class="first_calculate">
                <form class="form_block" method="get" action="" name="idx_mass">
                    <div class="fields">
                        <div class="height_field">
                            <label for="height">Рост:</label>
                            <input id="id_height" type="number" name="height" size="3"/>
                        </div>
                        <div class="space"></div>
                        <div class="weight_field">
                            <label for="weight">Вес:</label>
                            <input id="id_weight" type="number" name="weight" size="3"/>
                        </div>
                    </div>
                    <div class="submit_block"><input type="submit" value="Рассчитать" onclick="result1(); return false;"/></div>
                </form>
                <div class="hr_div"><hr></div>
                <div class="information" id="description_text">
                </div>
            </div>
            <div class="picture_block">
                <img class="picture" src="../images/bogy_mass_index.jpg" alt="picture">
            </div>
        </div>
        <div class="vertical"></div>
        <div class="second_main_block">
            <div class="description">Калькулятор базового обмена веществ</div>
            <div class="second_calculate">
                <form method="get" action="" name="methabolism">
                    <div class="fields">
                        <div class="height_field">
                            <label for="height">Рост:</label>
                            <input type="number" name="height" size="3" id="height2"/>
                        </div>
                        <div class="space"></div>
                        <div class="weight_field">
                            <label for="weight">Вес:</label>
                            <input type="number" name="weight" size="3" id="weight2"/>
                        </div>
                        <div class="space"></div>
                        <div class="age_field">
                            <label for="age2">Возраст:</label>
                            <input type="number" name="age" size="3" id="age2"/>
                        </div>
                    </div>
                    <div class="genders_lab">Пол:</div>
                    <div class="radio_check" id="gend">
                        <div class="radio_form">
                            <label for="male">Мужчина</label>
                            <input id="male" name="gender" type="radio" value="0" checked/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="female">Женщина</label>
                            <input id="female" name="gender" type="radio" value="1"/>
                        </div>
                    </div>
                    <div class="genders_lab">Уровень физической нагрузки:</div>
                    <div class="radio_check activity_level" id="activ">
                        <div class="radio_form">
                            <label for="low">Низкая</label>
                            <input id="low" name="activity_level" type="radio" value="1.2" checked/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="moderate">Умеренная</label>
                            <input id="moderate" name="activity_level" type="radio" value="1.3"/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="midle">Средняя</label>
                            <input id="midle" name="activity_level" type="radio" value="1.4"/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="high">Высокая</label>
                            <input id="high" name="activity_level" type="radio" value="1.6"/>
                        </div>
                    </div>
                    <div class="submit_block"><input type="submit" value="Рассчитать" onclick="result2(); return false;"></div>
                    <div class="hr_div"><hr></div>
                    <div class="information" id="inf">
                    </div>
                </form>
            </div>
            <div class="metabolism_description">Базовый обмен веществ - это минимальное количество энергии, необходимое для обеспечения нормальной жизнедеятельности организма в стандартных условиях.</div>
        </div>
    </div>
@endsection
