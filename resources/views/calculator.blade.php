@extends('layouts.app')

@section('title')
    Калькуляторы
@endsection

@section('link_style')
    <link href="{{ asset('../css/calculator.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('../css/calculator_mobile.css') }}" rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <div class="flex_block">
        <div class="first_main_block">
            <div class="description">Калькулятор индекса массы тела</div>

            <div class="first_calculate">
                <form class="form_block" method="get" action="" name="idx_mass">
                    <div class="fields">
                        <div class="height_field">
                            <label for="height">Рост:</label>
                            <input type="number" name="height" size="3"/>
                        </div>
                        <div class="space"></div>
                        <div class="weight_field">
                            <label for="weight">Вес:</label>
                            <input type="number" name="weight" size="3"/>
                        </div>
                    </div>
                    <div class="submit_block"><input type="submit" value="Рассчитать"/></div>
                </form>
                <div class="hr_div"><hr></div>
                <div class="information">
                    Ваш индекс массы тела: 17.17 Данное значение ИМТ соответствует: Недостаточной массе тела
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
                            <input type="number" name="height" size="3"/>
                        </div>
                        <div class="space"></div>
                        <div class="weight_field">
                            <label for="weight">Вес:</label>
                            <input type="number" name="weight" size="3"/>
                        </div>
                        <div class="space"></div>
                        <div class="age_field">
                            <label for="weight">Возраст:</label>
                            <input type="number" name="age" size="3"/>
                        </div>
                    </div>
                    <div class="genders_lab">Пол:</div>
                    <div class="radio_check">
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
                    <div class="radio_check activity_level">
                        <div class="radio_form">
                            <label for="low">Низкая</label>
                            <input id="low" name="activity_level" type="radio" value="0" checked/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="moderate">Умеренная</label>
                            <input id="moderate" name="activity_level" type="radio" value="1"/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="midle">Средняя</label>
                            <input id="midle" name="activity_level" type="radio" value="0"/>
                        </div>
                        <div class="space"></div>
                        <div class="radio_form">
                            <label for="high">Высокая</label>
                            <input id="high" name="activity_level" type="radio" value="1"/>
                        </div>
                    </div>
                    <div class="submit_block"><input type="submit" value="Рассчитать"></div>
                    <div class="hr_div"><hr></div>
                    <div class="information">
                        Для поддержания веса организму требуется:<br>1642 ккал в деwнь
                    </div>
                </form>
            </div>
            <div class="metabolism_description">Базовый обмен веществ - это минимальное количество энергии, необходимое для обеспечения нормальной жизнедеятельности организма в стандартных условиях.</div>
        </div>
    </div>
@endsection
