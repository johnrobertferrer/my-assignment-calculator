@extends('layouts.app', ['loadingStatus' => true])

@extends('components.navbar-admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div v-for="success_message in message.success" class="alert alert-success" role="alert">
                @{{ success_message }}
            </div>
        </div>
        <div class="col-md-12">
            <div v-for="error_message in message.errors" class="alert alert-danger" role="alert">
                @{{ error_message }}
            </div>
        </div>
        <div class="col-md-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item w-33 mr-0 text-center text-break">
                    <a class="nav-link active" id="student-information-tab" data-toggle="pill" href="#pills-student-information" role="tab" aria-controls="pills-student-information" aria-selected="true">Student Information</a>
                </li>
                <li class="nav-item w-33 mr-0 text-center">
                    <a class="nav-link" id="contents-tab" data-toggle="pill" href="#pills-contents" role="tab" aria-controls="pills-contents" aria-selected="false">Contents</a>
                </li>
                <li class="nav-item w-33 mr-0 text-center">
                    <a class="nav-link" id="custom-settings-tab" data-toggle="pill" href="#pills-custom-settings" role="tab" aria-controls="pills-custom-settings" aria-selected="false">Custom Settings</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-student-information" role="tabpanel" aria-labelledby="student-information-tab">
                    <div style="max-height: 70vh; overflow-y: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $customer->id }}</th>
                                        <td>{{ $customer->firstname }}</td>
                                        <td>{{ $customer->lastname }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contents" role="tabpanel" aria-labelledby="contents-tab">
                    <div style="max-height: 70vh; overflow-y: auto;">
                        <div class="row m-0 mb-3 text-center border border-dark font-weight-bold pt-2 pb-2">
                            <div class="col-lg-2 col-md-12">Step</div>
                            <div class="col-lg-2 col-md-12 border-left">Row</div>
                            <div class="col-lg-4 col-md-12 border-left">Resources</div>
                            <div class="col-lg-4 col-md-12 border-left">Notes</div>
                        </div>
                        <div v-for="step in steps">
                            <hr v-if="showLineBreak(step)">
                            <div class="row pt-2 pb-2 m-0 mb-2 border border-dark text-center">
                                <div class="col-lg-2 col-md-12 border-left mt-2">Step @{{ step.step_id }}</div>
                                <div class="col-lg-2 col-md-12 border-left mt-2">Row @{{ step.row_id }}</div>
                                <div class="col-lg-4 col-md-12 border-left mt-2">
                                    <input type="text" class="w-100" v-model="step.resources" :placeholder="setPlaceholderText(step, 'Resources')">
                                </div>
                                <div class="col-lg-4 col-md-12 mt-2">
                                    <input type="text" class="w-100" v-model="step.notes" :placeholder="setPlaceholderText(step, 'Notes')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-custom-settings" role="tabpanel" aria-labelledby="custom-settings-tab">
                    <div style="max-height: 70vh; overflow-y: auto;">
                    </div>
                </div>
            </div>

            <button class="mt-3 btn btn-block btn-primary" @click="save()">Save and Apply Changes</button>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ mix('/js/admin.js') }}"></script>
@endsection
