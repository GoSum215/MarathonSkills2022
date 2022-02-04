@extends('layouts.app')

@section('title')
    Результаты забегов
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/race_result.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/race_result_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <div class="card_ all">
        <img class="collum1_" src="{{ asset('../images/foto_marathona.png') }}" alt="photo">
        <div class="collum2_">
            <div class="row_">{{ $marat->name }}</div>
            <div class="row_">{{ $marat->date }}</div>
        </div>
        <div class="collum3_">
            <div class="row_ row_none"></div>
            <div class="row_">{{ $marat->city }}</div>
            <div class="row_">{{ $marat->country }}</div>
        </div>
    </div>

    <div class="control all">
        @if(isset($eve[0]))
            <button onclick="select(1)">5 km</button>
        @endif
        @if(isset($eve[1]))
            <button onclick="select(2)">10 km</button>
        @endif
        @if(isset($eve[2]))
            <button onclick="select(3)">21 km</button>
        @endif
        @if(isset($eve[3]))
            <button onclick="select(4)">42 km</button>
        @endif
    </div>

    <div id="list5">
        <div class="table all">
            @foreach($marathons5 as $i5 => $marathon5)
                <div class="row_table">
                    <div class="number">{{ $i5 + 1 }}</div>
                    <div class="fio">{{ $marathon5->surname }} {{ $marathon5->name }}</div>
                    <div class="race_time">{{ $marathon5->time }}</div>
                    <div class="age">{{ $marathon5->country }}</div>
                    @if($i5 === 0)
                        <img class="megal" src="{{ asset('../images/gold_medal.png') }}" alt="gold_medal">
                    @endif
                    @if($i5 === 1)
                        <img class="megal" src="{{ asset('../images/silver_medal.png') }}" alt="silver_medal">
                    @endif
                    @if($i5 === 2)
                        <img class="megal" src="{{ asset('../images/bronze_medal.png') }}" alt="bronze_medal">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div id="list10">
        <div class="table all">
            @foreach($marathons10 as $i10 => $marathon10)
                <div class="row_table">
                    <div class="number">{{ $i10 + 1 }}</div>
                    <div class="fio">{{ $marathon10->surname }} {{ $marathon10->name }}</div>
                    <div class="race_time">{{ $marathon10->time }}</div>
                    <div class="age">{{ $marathon10->country }}</div>
                    @if($i10 === 0)
                        <img class="megal" src="{{ asset('../images/gold_medal.png') }}" alt="gold_medal">
                    @endif
                    @if($i10 === 1)
                        <img class="megal" src="{{ asset('../images/silver_medal.png') }}" alt="silver_medal">
                    @endif
                    @if($i10 === 2)
                        <img class="megal" src="{{ asset('../images/bronze_medal.png') }}" alt="bronze_medal">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div id="list21">
        <div class="table all">
            @foreach($marathons21 as $i21 => $marathon21)
                <div class="row_table">
                    <div class="number">{{ $i21 + 1 }}</div>
                    <div class="fio">{{ $marathon21->surname }} {{ $marathon21->name }}</div>
                    <div class="race_time">{{ $marathon21->time }}</div>
                    <div class="age">{{ $marathon21->country }}</div>
                    @if($i21 === 0)
                        <img class="megal" src="{{ asset('../images/gold_medal.png') }}" alt="gold_medal">
                    @endif
                    @if($i21 === 1)
                        <img class="megal" src="{{ asset('../images/silver_medal.png') }}" alt="silver_medal">
                    @endif
                    @if($i21 === 2)
                        <img class="megal" src="{{ asset('../images/bronze_medal.png') }}" alt="bronze_medal">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div id="list42">
        <div class="table all">
            @foreach($marathons42 as $i42 => $marathon42)
                <div class="row_table">
                    <div class="number">{{ $i42 + 1 }}</div>
                    <div class="fio">{{ $marathon42->surname }} {{ $marathon42->name }}</div>
                    <div class="race_time">{{ $marathon42->time }}</div>
                    <div class="age">{{ $marathon42->country }}</div>
                    @if($i42 === 0)
                        <img class="megal" src="{{ asset('../images/gold_medal.png') }}" alt="gold_medal">
                    @endif
                    @if($i42 === 1)
                        <img class="megal" src="{{ asset('../images/silver_medal.png') }}" alt="silver_medal">
                    @endif
                    @if($i42 === 2)
                        <img class="megal" src="{{ asset('../images/bronze_medal.png') }}" alt="bronze_medal">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <script>
        let list5 = document.getElementById('list5');
        let list10 = document.getElementById('list10');
        let list21 = document.getElementById('list21');
        let list42 = document.getElementById('list42');
        list5.style['display'] = 'none';
        list10.style['display'] = 'none';
        list21.style['display'] = 'none';
        list42.style['display'] = 'none';

        function select(i) {
            list5.style['display'] = 'none';
            list10.style['display'] = 'none';
            list21.style['display'] = 'none';
            list42.style['display'] = 'none';
            if(i === 1) {
                list5.style['display'] = 'flex';
            }
            else if(i === 2) {
                list10.style['display'] = 'flex';
            }
            else if(i === 3) {
                list21.style['display'] = 'flex';
            }
            else if(i === 4) {
                list42.style['display'] = 'flex';
            }
        }
    </script>
@endsection
