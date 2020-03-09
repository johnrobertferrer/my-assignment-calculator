@extends('layouts.app', ['background' => asset('img/pattern.svg'), 'loadingStatus' => true])

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
    <div v-if="progressbar.visible">
        <div class="wrapper mb-4">
            <div class="progress-bar">
                <span class="progress-bar-fill" style="width: 100%;">Generating ...</span>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12" data-html2canvas-ignore="true">
            <div v-for="success_message in success.message" class="alert alert-success" role="alert">
                Successfully recorded this student information: [@{{ success_message }}]
            </div>
        </div>
        <div class="col-12" data-html2canvas-ignore="true">
            <div v-for="error_message in errors.message" class="alert alert-danger" role="alert">
                @{{ error_message }}
            </div>
        </div>
        <div class="col-lg-8 col-md-12 mb-4">
            <div class="section section-card p-5 blue with-border">
                <div class="full-width">
                    <div class="header text-black text-center font-weight-bold orange p-1 with-border">
                    <label class="header-text header-1">Assignment Calculator</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-4 plr-0 pr-15">
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow with-border-bottom" scope="col" colspan="2">Assignment #1</th>
                                    <th class="peach with-border-bottom with-border-left" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green with-border-bottom">Start Date</td>
                                    <td class="white with-border-bottom with-border-left start p-0">
                                        <v-date-picker v-model="assignment.one.start" />
                                    </td>
                                    <td class="light-peach with-border-bottom with-border-left">@{{ getTotalDays('one')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white with-border-left end">
                                        <v-date-picker v-model="assignment.one.end" />
                                    </td>
                                    <td class="light-peach with-border-left">Days</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pt-3 pb-3 white with-border-left with-border-right">
                        </div>
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow with-border-bottom" scope="col" colspan="2">Assignment #2</th>
                                    <th class="peach with-border-bottom with-border-left" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green with-border-bottom">Start Date</td>
                                    <td class="white with-border-bottom with-border-left start p-0">
                                        <v-date-picker v-model="assignment.two.start" />
                                    </td>
                                    <td class="light-peach with-border-bottom with-border-left">@{{ getTotalDays('two')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white with-border-left end">
                                        <v-date-picker v-model="assignment.two.end" />
                                    </td>
                                    <td class="light-peach with-border-left">Days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 col-md-12 mt-4 plr-0 pl-15">
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow with-border-bottom" scope="col" colspan="2">Assignment #3</th>
                                    <th class="peach with-border-bottom with-border-left" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green with-border-bottom">Start Date</td>
                                    <td class="white with-border-bottom with-border-left start p-0">
                                        <v-date-picker v-model="assignment.three.start" />
                                    </td>
                                    <td class="light-peach with-border-bottom with-border-left">@{{ getTotalDays('three')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white with-border-left end">
                                        <v-date-picker v-model="assignment.three.end" />
                                    </td>
                                    <td class="light-peach with-border-left">Days</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pt-3 pb-3 white with-border-left with-border-right"></div>
                        <table class="full-width with-border">
                            <thead>
                                <tr>
                                    <th class="yellow with-border-bottom" scope="col" colspan="2">Assignment #4</th>
                                    <th class="peach with-border-bottom with-border-left" scope="col" colspan="1">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="green with-border-bottom">Start Date</td>
                                    <td class="white with-border-bottom with-border-left start p-0">
                                        <v-date-picker v-model="assignment.four.start" />
                                    </td>
                                    <td class="light-peach with-border-bottom with-border-left">@{{ getTotalDays('four')  }}</td>
                                </tr>
                                <tr>
                                    <td class="green">End Date</td>
                                    <td class="white with-border-left end">
                                        <v-date-picker v-model="assignment.four.end" />
                                    </td>
                                    <td class="light-peach with-border-left">Days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="section section-card p-5 orange mt-4 with-border page-break-always">
                <div class="full-width">
                    <div class="header text-black text-center font-weight-bold blue p-1 with-border">
                        <label class="header-text header-1">The 7 Essay Steps</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-4 plr-0">
                        <table class="full-width with-border mt-2px" v-for="stepId in reference.stepIds">
                            <tbody>
                                <tr>
                                    <td :class="getStepHeaderClassName(stepId, 'pure')" rowspan="4">
                                        <label class="vertical-text-1 text-center font-weight-bold">STEP @{{ stepId }}</label>
                                    </td>
                                    <td :class="getStepHeaderClassName(stepId, 'light')">Resources</td>
                                    <td :class="getStepHeaderClassName(stepId, 'light')">Notes</td>
                                </tr>
                                <tr>
                                    <td class="white with-border-bottom with-border-left w-50 p-2"> @{{ getStepData(stepId, '1', 'resources') }} </td>
                                    <td class="white with-border-bottom with-border-left w-50 p-2"> @{{ getStepData(stepId, '1', 'notes') }} </td>
                                </tr>
                                <tr>
                                    <td class="white with-border-bottom with-border-left w-50 p-2"> @{{ getStepData(stepId, '2', 'resources') }} </td>
                                    <td class="white with-border-bottom with-border-left w-50 p-2"> @{{ getStepData(stepId, '2', 'notes') }} </td>
                                </tr>
                                <tr>
                                    <td class="white with-border-bottom with-border-left w-50 p-2"> @{{ getStepData(stepId, '3', 'resources') }} </td>
                                    <td class="white with-border-bottom with-border-left w-50 p-2"> @{{ getStepData(stepId, '3', 'notes') }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="footer section section-card mt-4" v-show="showFooter"> 
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
                                <th :class="getStepHeaderClassName({{ $step['id'] }}, 'right-pure')" scope="col" colspan="1">Step {{ $step['id'] }}</th>
                                <th :class="getStepHeaderClassName({{ $step['id'] }}, 'right-light')" scope="col" colspan="2">{{ $step['name'] }}</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="full-width with-border mt-2px">
                        <tbody>
                            <tr>
                                <td class="green font-weight-bold with-border-bottom">ASSIGNMENTS</td>
                                <td class="green font-weight-bold with-border-left with-border-right with-border-bottom">COMPLETION DATES</td>
                            </tr>
                            <tr>
                                <td class="dirty-green with-border-top">Module #1</td>
                                <td class="dirty-green with-border-top with-border-left">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'one') }}</td>
                            </tr>
                            <tr>
                                <td class="dirty-gray with-border-top">Module #2</td>
                                <td class="dirty-gray with-border-top with-border-left">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'two') }}</td>
                            </tr>
                            <tr>
                                <td class="dirty-green with-border-top">Module #3</td>
                                <td class="dirty-green with-border-top with-border-left">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'three') }}</td>
                            </tr>
                            <tr>
                                <td class="dirty-gray with-border-top">Module #4</td>
                                <td class="dirty-gray with-border-top with-border-left">@{{ getCompletionDateByStep({!! $step['rate'] !!}, 'four') }}</td>
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

            <div class="footer section section-card mt-4 p-5" v-if="window.width < 992" data-html2canvas-ignore="true"> 
                <label class="font-weight-bolder text-center full-width">
                    @2020 Dr Irene Dudley-Swarbrick, Al Rights Reserved
                </label>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    <modal
        data-html2canvas-ignore="true"
        v-show="modal.customerInfo"
        @submitted="showSuccessResult"
        @close="closeModal"
    />
@endsection

@section('script')
    <script src="{{ mix('/js/welcome.js') }}"></script>
@endsection