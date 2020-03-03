@extends('layouts.app', ['background' => asset('img/pattern.svg')])

@if ($withNav)
    @extends('components.navbar-customer')
@endif

@php
    $steps = [
        [
            'id' => 1,
            'name' => 'PRE-PLANNING',
            'color' => 'violet',
            'rate' => 0.05
        ],
        [
            'id' => 2,
            'name' => 'PLAN YOUR MAP',
            'color' => 'gold',
            'rate' => 0.15
        ],
        [
            'id' => 3,
            'name' => 'PLAN YOUR READING',
            'color' => 'blue',
            'rate' => 0.40
        ],
        [
            'id' => 4,
            'name' => 'PEN TO PAPER',
            'color' => 'pink',
            'rate' => 0.75
        ],
        [
            'id' => 5,
            'name' => 'PRUNE IT BACK',
            'color' => 'green',
            'rate' => 0.85
        ],
        [
            'id' => 6,
            'name' => 'PAUSE TO PROCESS',
            'color' => 'indigo',
            'rate' => 0.90
        ],
        [
            'id' => 7,
            'name' => 'POLISH IT UP',
            'color' => 'peach',
            'rate' => 1
        ]
    ];
@endphp

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
            <div class="section section-card p-5 blue with-border">
                <div class="full-width">
                    <div class="header text-black text-center font-weight-bold orange p-1 with-border">
                    <label class="header-text header-1">Assignment Calculator</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-4">
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow" scope="col" colspan="2">Assignment #1</th>
                                    <th class="peach" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green">Start Date</td>
                                    <td class="white start p-0">
                                        <v-date-picker v-model="assignment.one.start" />
                                    </td>
                                    <td class="light-peach">@{{ getTotalDays('one')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white end">
                                        <v-date-picker v-model="assignment.one.end" />
                                    </td>
                                    <td class="light-peach">Days</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pt-3 pb-3 white with-border-left with-border-right">
                        </div>
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow" scope="col" colspan="2">Assignment #2</th>
                                    <th class="peach" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green">Start Date</td>
                                    <td class="white start p-0">
                                        <v-date-picker v-model="assignment.two.start" />
                                    </td>
                                    <td class="light-peach">@{{ getTotalDays('two')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white end">
                                        <v-date-picker v-model="assignment.two.end" />
                                    </td>
                                    <td class="light-peach">Days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 col-md-12 mt-4">
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow" scope="col" colspan="2">Assignment #3</th>
                                    <th class="peach" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green">Start Date</td>
                                    <td class="white start p-0">
                                        <v-date-picker v-model="assignment.three.start" />
                                    </td>
                                    <td class="light-peach">@{{ getTotalDays('three')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white end">
                                        <v-date-picker v-model="assignment.three.end" />
                                    </td>
                                    <td class="light-peach">Days</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pt-3 pb-3 white with-border-left with-border-right"></div>
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow" scope="col" colspan="2">Assignment #4</th>
                                    <th class="peach" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green">Start Date</td>
                                    <td class="white start p-0">
                                        <v-date-picker v-model="assignment.four.start" />
                                    </td>
                                    <td class="light-peach">@{{ getTotalDays('four')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white end">
                                        <v-date-picker v-model="assignment.four.end" />
                                    </td>
                                    <td class="light-peach">Days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="section section-card p-5 orange mt-4 with-border">
                <div class="full-width">
                    <div class="header text-black text-center font-weight-bold blue p-1 with-border">
                        <label class="header-text header-1">The 7 Essay Steps</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-4">
                        @foreach ($steps as $step)
                            <table class="full-width with-border mt-2px">
                                <tbody>
                                    <tr>
                                        <td class="{{ $step['color'] }}-pure w-10-p text-white p-0-important" rowspan="4">
                                            <label class="vertical-text-1 text-center font-weight-bold">STEP {{ $step['id']}}</label>
                                        </td>
                                        <td class="{{ $step['color'] }}-light p-2">Resources</td>
                                        <td class="{{ $step['color'] }}-light p-2">Notes</td>
                                    </tr>
                                    <tr>
                                        <td class="white"></td>
                                        <td class="white"></td>
                                    </tr>
                                    <tr>
                                        <td class="white"></td>
                                        <td class="white"></td>
                                    </tr>
                                    <tr>
                                        <td class="white"></td>
                                        <td class="white"></td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="footer section section-card mt-4 p-5"> 
                <label class="font-weight-bolder text-center full-width">
                    @2020 Dr Irene Dudley-Swarbrick, Al Rights Reserved
                </label>
            </div>
        </div>

        <div class="col-lg-4 col-md-12" id="right">
            <div class="section section-card p-5 orange with-border">
                @foreach ($steps as $step)
                    <table class="full-width with-border">
                        <thead>
                            <tr>
                                <th class="{{ $step['color'] }}-pure text-white" scope="col" colspan="1">Step {{ $step['id'] }}</th>
                                <th class="{{ $step['color'] }}-light" scope="col" colspan="2">{{ $step['name'] }}</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="full-width with-border mt-2px">
                        <tbody>
                            <tr>
                                <td class="green font-weight-bold">ASSIGNMENTS</td>
                                <td class="green font-weight-bold">COMPLETION DATES</td>
                            </tr>
                            <tr>
                                <td class="dirty-green">Module #1</td>
                                <td class="dirty-green">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'one') }}</td>
                            </tr>
                            <tr>
                                <td class="dirty-gray">Module #2</td>
                                <td class="dirty-gray">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'two') }}</td>
                            </tr>
                            <tr>
                                <td class="dirty-green">Module #3</td>
                                <td class="dirty-green">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'three') }}</td>
                            </tr>
                            <tr>
                                <td class="dirty-gray">Module #4</td>
                                <td class="dirty-gray">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'four') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @if ($step['id'] === 7)
                        <div class="pt-3 pb-3 white with-border-left with-border-right with-border-bottom"></div>
                    @else
                        <div class="pt-3 pb-3 white with-border-left with-border-right"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ mix('/js/welcome.js') }}"></script>
@endsection