@extends('layouts.secondaryLayout')

@section('sec-title', 'Form | Log Incident')

@section('sec-content')
    
    <h1 class="osh-bg text-center">Log Incident</h1>

    <form action="{{route('incidents.store')}}" method="post" class="m-0">
        @csrf

        
        <div class="osh-bg mt-3">
            <div class="row m-0">
            
                <div class="col col-6 p-0 pe-1">
                    <div class="osh-outline">
                        <label for="get_brgy"><h4>Barangay:</h4></label>
                        <select name="get_brgy" id="get_brgy" class="form-select"  onchange="getId()">
                            <option value="">None</option>
                            @foreach($brgy as $row)
                                <option value="{{$row->mun_id}},{{$row->brgy_id}}">{{$row->mun_name}} - {{$row->brgy_name}} </option>
                            @endforeach
                        </select>
                        <input type="text" name="mun_id" id="mun_id" class="form-control" hidden>
                        <input type="text" name="brgy_id" id="brgy_id" class="form-control" hidden>
                        @error('mun_id')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                    <script>
                        function getId(){
                            var check = document.getElementById('get_brgy').value;
                            var selected = document.getElementById('get_brgy');
            
                            if(check){
                                var data = selected.options[selected.selectedIndex].value;
                                var text = selected.options[selected.selectedIndex].text;
                                let formun = data.slice(0, data.indexOf(","));
                                let forbrgy = data.slice(data.indexOf(",") + 1);
                                document.getElementById('mun_id').value = formun;
                                document.getElementById("brgy_id").value = forbrgy;
                            }else{
                                document.getElementById('mun_id').value = '';
                                document.getElementById("brgy_id").value = '';
                            }
                        }
                    </script>
                </div>
                <div class="col col-3 p-0 px-1">
                    <div class="osh-outline">
                        <label for="rep_date"><h4>Date Reported:</h4></label>
                        <input type="date" name="rep_date" class="form-control" value="{{old('rep_date')}}">
                        @error('rep_date')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-3 p-0 ps-1">
                    <div class="osh-outline">
                        <label for="empName"><h4>Employee</h4></label>
                        <input type="text" name="empName" value="{{$emp->e_fname}} {{$emp->e_lname}}" class="form-control" readonly disabled aria-label="Disabled input example">
                        <input type="text" name="empId" value="{{$emp->id}}" hidden>
                    </div>
                </div>
                <div class="col col-12 mt-3 p-0">
                    <div class="osh-outline">
                        <label for="location"><h4>Exact Location of Incident</h4></label>
                        <input type="text" name="location" value="{{old('location')}}" class="form-control" >
                        @error('location')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="osh-bg mt-3">
            <div class="row m-0">
                <div class="col col-12 p-0">
                    <div class="osh-outline">
                        <label for="description"><h4>Type of Incident:</h4></label>
                        <div class="form-floating">
                            <textarea class="form-control" name="typeOfIncident" placeholder="Leave a Description here" id="floatingTextarea">{{old('typeOfIncident')}}</textarea>
                            <label for="floatingTextarea">(Curfew hours, ordinance related, etc)</label>
                          </div>
                        @error('typeOfIncident')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-12 mt-3 p-0">
                    <div class="osh-outline">
                        <label for="dates_time"><h4>Inclusive Dates and Time of Incident:</h4></label>
                        <div class="form-floating">
                            <textarea class="form-control" name="dates_time" placeholder="Leave a dates and time here" id="floatingTextarea" style="height: 100px;">{{old('dates_time')}}</textarea>
                            <label for="floatingTextarea">(Inclusive Dates and Time of Incident)</label>
                          </div>
                        @error('dates_time')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-12 mt-3 p-0">
                    <div class="osh-outline">
                        <label for="description"><h4>Description:</h4></label>
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a Description here" id="floatingTextarea" style="height: 100px;">{{old('description')}}</textarea>
                            <label for="floatingTextarea">(Description on how the incident happened, others)</label>
                          </div>
                        @error('description')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-12 mt-3 p-0">
                    <div class="osh-outline">
                        <label for="involved"><h4>Involved Person/Specific Identification:</h4></label>
                        <div class="form-floating">
                            <textarea class="form-control" name="involved" placeholder="Involved" id="floatingTextarea" style="height: 100px;"></textarea>
                            <label for="floatingTextarea">(Name, Age, Gender, Address, Position/Designation)</label>
                          </div>
                        @error('involved')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col col-12 mt-3 p-0">
                    <div class="osh-outline">
                        <label for="action_taken"><h4>Action Taken:</h4></label>
                        <div class="form-floating">
                            <textarea class="form-control" name="action_taken" placeholder="Action Taken" id="floatingTextarea" style="height: 100px;"></textarea>
                            <label for="floatingTextarea">Action Taken</label>
                          </div>
                        @error('involved')
                            <div class="mt-1 text-center" style="background-color: rgb(255, 100, 100); border-radius:10px;">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            
            
            </div>
        </div>

        {{-- For Buttons --}}
        <div class="row mt-5">
            <div class="col col-6">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
            <div class="col col-6">
                <a href="{{route('incidents.index')}}" class="btn btn-secondary w-100">Cancel</a>
            </div>
        </div>

    </form>

@endsection