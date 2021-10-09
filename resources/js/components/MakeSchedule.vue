<template>


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Schedule</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
                <div class="card-body">

<!-- @if (session('status'))
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('failed') }}
</div>
@endif

@if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
@endif -->

                  <div class="form-group" >
                    <form action="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <!-- <input type="text" name="id" value="{{session()->get('id')}}" /> -->
                      
                    <label for="">Saturday:</label> <input class="form-control" id="sat_time_1" type="time" v-model="sat_time_1" name="sat_time_1" > to <input class="form-control" id="sat_time_2" type="time" v-model="sat_time_2" name="sat_time_2">
  <br>
  <label for="">Sunday:</label> <input class="form-control" id="sun_time_1" type="time" v-model="sun_time_1" name="sun_time_1" > to <input class="form-control" id="sun_time_2" type="time" v-model="sun_time_2" name="sun_time_2">
  <br>
  <label for="">Monday:</label> <input class="form-control" id="mon_time_1" type="time" v-model="mon_time_1" name="mon_time_1" > to <input class="form-control" id="mon_time_2" type="time" v-model="mon_time_2" name="mon_time_2">
  <br>
  <label for="">Tuesday:</label> <input class="form-control" id="tue_time_1" type="time" v-model="tue_time_1" name="tue_time_1" > to <input class="form-control" id="tue_time_2" type="time" v-model="tue_time_2" name="tue_time_2">
  <br>
  <label for="">Wednesday:</label> <input class="form-control" id="wed_time_1" type="time" v-model="wed_time_1" name="wed_time_1" > to <input class="form-control" id="wed_time_2" type="time" v-model="wed_time_2" name="wed_time_2">
  <br>
  <label for="">Thursday:</label> <input class="form-control" id="thu_time_1" type="time" v-model="thu_time_1" name="thu_time_1" > to <input class="form-control" id="thu_time_2" type="time" v-model="thu_time_2" name="thu_time_2">
  <br>
  <label for="">Friday:</label> <input class="form-control" id="fri_time_1" type="time" v-model="fri_time_1" name="fri_time_1" > to <input class="form-control" id="fri_time_2" type="time" v-model="fri_time_2" name="fri_time_2">
                    </form>
                  </div>

                  <!-- <div class="form-group" v-if="cities_values.length">
                    <label for="city">City</label>
                    <select class="form-control" name="cities_id" id="cities_id" v-model="cities_id">
                      <option value="">--Select--</option>
                      <option @click="fetchDataForCity(city.id)" v-for="city in cities_values" v-bind:value="city.id">
                        @{{city.city}}
                      </option>
                    </select>
                  </div>

                  <div class="form-group" v-if="thanas_values.length">
                    <label for="thana">Thana</label>
                    <select class="form-control" name="thanas_id" id="thanas_id" v-model="thanas_id">
                      <option value="">--Select--</option>
                      <option v-for="thana in thanas_values" v-bind:value="thana.id">
                        @{{thana.thana}}
                      </option>
                    </select>
                    <br>
                    <label for="area">Area</label>
                    <input type="text" name="area" class="form-control" id="area" placeholder="Add Area" v-model="area" value="{{old('area')}}">
                  </div>

                  <div>
    
                  </div> -->

                  <!-- <div class="form-group">
                    
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                 <div class="card-footer">
                  <button type="submit" @click.prevent='submit();' class="btn btn-primary">Add</button>
                </div>
            
            </div>

</template>

<script>

import axios from 'axios'
import _ from 'lodash'
// console.log("{{Session::id()}}");
export default {

data() {
      return {
       
          user_id : "",
          sat_time_1: "",
          sat_time_2: "",
          sun_time_1: "",
          sun_time_2: "",
          mon_time_1: "",
          mon_time_2: "",
          tue_time_1: "",
          tue_time_2: "",
          wed_time_1: "",
          wed_time_2: "",
          thu_time_1: "",
          thu_time_2: "",
          fri_time_1: "",
          fri_time_2: "",
        _token: "",
        // isLoggedIn : false,
        // avatar: "",
        // avatarName: null,
        // showForm: true,
           success_msg: null,
           error_msg: null,
        // error_name : "",
        // error_email : "",
        // error_avatar : "",
        // error_website : "",
      }
    },
    mounted() {
    //console.log(session_id())
    //console.log(this.$userId)
    axios.get('/loggedinSession/').then(response=>{
    console.log(response.data.data);

    this.user_id = response.data.data;

    // this.$session.start();
    //    this.$session.set("user_id", response.data.data);
    
    // this.cities_values = response.data.data,
    // app.cities_id = '';
    // //this.cities_values,
    // console.log(this.cities_values);
    // application.classes = response.data.classes;
    // application.subjects = response.data.subjects;
    // application.hiddenId = response.data.id;
    // application.myModel = true;
    // application.actionButton = 'Update';
    // application.dynamicTitle = 'Edit subject';
   });
},
    methods: {
        submit(){
          
          console.log(this.user_id);
// this.$session.start();
//        this.$session.set("id", this.session());
// axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
            axios.post('http://127.0.0.1:8000/api/add_doctors_schedule', {
               headers: {
                            'content-type': 'apllication/json', 
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        id: this.user_id,
          sat_time_1: this.sat_time_1,
          sat_time_2: this.sat_time_2,
          sun_time_1: this.sun_time_1,
          sun_time_2: this.sun_time_2,
          mon_time_1: this.mon_time_1,
          mon_time_2: this.mon_time_2,
          tue_time_1: this.tue_time_1,
          tue_time_2: this.tue_time_2,
          wed_time_1: this.wed_time_1,
          wed_time_2: this.wed_time_2,
          thu_time_1: this.thu_time_1,
          thu_time_2: this.thu_time_2,
          fri_time_1: this.fri_time_1,
          fri_time_2: this.fri_time_2,
          _token: '{{csrf_token()}}',
  })
  .then(function (response) {
    console.log(response);
    if(response.status==200){
      alert("Schedule Added");
    }
  })
  .catch(function (error) {
    console.log(error);
  });


        }
    }

}
</script>

<style>

</style>