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
                    <div>
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
                    <div>
                        <div class="row m-0 mb-3 text-center border border-dark font-weight-bold pt-2 pb-2">
                            <div class="col-lg-2 col-md-6 col-6">Step #</div>
                            <div class="col-lg-2 col-md-6 col-6 border-left">Row #</div>
                            <div class="col-lg-4 col-md-12 border-left">Resources</div>
                            <div class="col-lg-4 col-md-12 border-left">Notes</div>
                        </div>
                        <div v-for="step in steps">
                            <hr v-if="showLineBreak(step)">
                            <div class="row pt-2 pb-2 m-0 mb-2 border border-dark text-center">
                                <div class="col-lg-2 col-md-6 col-6 border-left mt-2 pt-1 pb-1">Step @{{ step.step_id }}</div>
                                <div class="col-lg-2 col-md-6 col-6 border-left mt-2 pt-1 pb-1">Row @{{ step.row_id }}</div>
                                <div class="col-lg-4 col-md-12 border-left pt-1 pb-1">
                                    <input type="text" class="w-100 form-control" v-model="step.resources" :placeholder="setPlaceholderText(step, 'Resources')">
                                </div>
                                <div class="col-lg-4 col-md-12 pt-1 pb-1">
                                    <input type="text" class="w-100 form-control" v-model="step.notes" :placeholder="setPlaceholderText(step, 'Notes')">
                                </div>
                            </div>
                        </div>
                        <button class="mt-3 btn btn-block btn-primary" @click="update()">Save and Apply Changes</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-custom-settings" role="tabpanel" aria-labelledby="custom-settings-tab">
                    <div class="alert alert-primary font-italic" role="alert">
                        <b>Note:</b> this will change the overall font styling. For better viewing, please select the default font. <br><br><hr> The default font is Nunito, under safe font.
                    </div>
                    <div>
                        <div class="mt-2 mb-2">
                            <strong>Font Type:</strong>
                            <select class="custom-select mb-3" v-model="font.font_type">
                                <option value="2" selected>Select Safe Font & Set As Default Font</option>
                                <option value="3">Select Old Custom Font & Set As Default Font</option>
                                <option value="1">Upload Custom Font & Set As Default Font</option>
                            </select>
                        </div>
                        <div class="mt-2 mb-2" v-if="font.font_type == 3">
                            <strong>Please select default font:</strong>
                            <select class="custom-select" v-model="font.old_custom_font">
                                <option v-for="oldCustomFont in oldCustomFonts" :value="oldCustomFont.path_location">@{{ oldCustomFont.name }}</option>
                            </select>
                        </div>
                        <div class="mt-2 mb-2" v-if="font.font_type == 2">
                            <strong>Please select default font:</strong>
                            <select class="custom-select" v-model="font.font_safe">
                                <option value="Nunito">Nunito</option>
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Times">Times</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Courier">Courier</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Palatino">Palatino</option>
                                <option value="Garamond">Garamond</option>
                                <option value="Bookman">Bookman</option>
                                <option value="Comic Sans MS">Comic Sans MS</option>
                                <option value="Candara">Candara</option>
                                <option value="Arial Black">Arial Black</option>
                                <option value="Impact">Impact</option>
                            </select>
                        </div>
                        <div class="mt-2 mb-2" v-if="font.font_type == 1">
                            <strong>Custom Font Name: (Required Field)</strong>
                            <input type="text" class="w-100 required form-control placeholder-left" v-model="font.custom_font_name">
                            <strong>Upload you font file:</strong>
                            <input type="file" class="form-control p-1" v-on:change="onFileChange">
                        </div>
                        <button class="mt-3 btn btn-block btn-primary" @click="formSubmit()">Save and Apply Changes</button>
                    </div>
                </div>
            </div>
                            {{-- <button @click="formSubmit()" class="btn btn-success">Submit</button> --}}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ mix('/js/admin.js') }}"></script>
@endsection
