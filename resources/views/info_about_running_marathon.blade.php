@extends('layouts.app')

@section('title')
    Информация о марафоне
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/info_about_running_marathon.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/info_about_running_marathon_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="main_div all">
        <div class="name_block">
            <h1>{{ $marathon->marathon_name }}</h1>
        </div>
        <div class="info_block">
            <div class="place_info">
                <div class="info_block_text">Дата: {{ $marathon->date_start_marathon }}</div>
                <div class="info_block_text">Город: {{ $marathon->city_name }}</div>
                <div class="info_block_text">Страна: {{ $marathon->country }}</div>
            </div>
            <div class="description">
                <div class="info_block_text">{{ $marathon->description }}</div>
            </div>
            <div class="photo_block">
                <img class="photo" src="{{ asset('../images/foto_marathona.png') }}" alt="photo">
            </div>
        </div>

        <div class="form_block">
            <div class="distance info_block_text">Выбор дисстанции:</div>
            <form action="{{ route('reg_for_marathon', ['slug' => $slug]) }}" method="post" name="distance">
                @csrf
                <div class="input_block" id='radio_div'>
                    @if(isset($eve[0]))
                        <input type="radio" id="distance1" name="distance" onclick="switchTime(0)" class="custom_checkbox" value="0" required>
                        <label for="distance1">5км</label>
                    @endif
                    @if(isset($eve[1]))
                        <input type="radio" id="distance2" name="distance" onclick="switchTime(1)" class="custom_checkbox" value="1" required>
                        <label for="distance2">10км</label>
                    @endif
                    @if(isset($eve[2]))
                        <input type="radio" id="distance3" name="distance" onclick="switchTime(2)" class="custom_checkbox" value="2" required>
                        <label for="distance3">21км</label>
                    @endif
                    @if(isset($eve[3]))
                        <input type="radio" id="distance4" name="distance" onclick="switchTime(3)" class="custom_checkbox" value="3" required>
                        <label for="distance4">42км</label>
                    @endif
                </div>
                @if(!isset($eve['end']))
                    <p id="time_label">Марафон длится:</p>
                    <div class="time_block" id="time"></div>
                @endif
            </form>
        </div>
    </div>
    <script>
        currentPlayPauseId = setInterval(show_time, 1000)
        function show_time(){
            let now_time = new Date();
            let time = new Date(now_time.getFullYear(), now_time.getMonth(), now_time.getDay()-1, Number(begin_time[0]), Number(begin_time[1]), Number(begin_time[2]));
            let time_ms = now_time - time;

            while (time_ms < 0) {
                time_ms += 86400000;
            }

            let hours = Math.trunc(time_ms / 3600000);
            time_ms = time_ms - (hours * 3600000);
            let minutes = Math.round(time_ms / 60000);
            time_ms = time_ms - (minutes * 60000);
            let sec = Math.trunc(time_ms / 1000 + 30);

            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;
            if (sec < 10) sec = '0' + sec;

            document.getElementById('time').textContent = hours + ' : '+ minutes +' : ' + sec ;
        }
        // В массиве array лежит время начала каждого забега, которое не получилось достать из бд
        let array = [];


        array = ['14:10:13', '13:37:32', '11:56:21', '10:21:12']
        let begin_time;
        function switchTime(i) {
            begin_time = array[i]
            begin_time = begin_time.split(':');
            show_time();
        }
{{--        @foreach($even as $ev)--}}
{{--            //array[{{ $ev->type }}] =--}}
{{--            alert({{ $ev->time }});--}}
{{--        @endforeach--}}
        //switchTime(0);
        let b = 1
        let a = String(1)
    </script>
@endsection
