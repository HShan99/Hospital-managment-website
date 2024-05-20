<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        label{
        display: inline-block;
        width: 200px;
    }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">

        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->


        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top:100px">
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px">
                        <label>Doctor Name</label>
                        <input type="text" name="name" style="color: black" placeholder="Write the name">
                    </div>

                    <div style="padding: 15px">
                        <label>Phone Number</label>
                        <input type="text" name="phone" style="color: black" placeholder="Write the number">
                    </div>

                    <div style="padding: 15px">
                        <label>Speciality</label>
                        <select name="spacialty" style="color: black; width:200px">
                            <option>--Select--</option>
                            <option value="Skin">Skin</option>
                            <option value="Hart">Hart</option>
                            <option value="Head">Head</option>
                            <option value="Eye">Eye</option>
                        </select>
                    </div>

                    <div style="padding: 15px">
                        <label>Room Number</label>
                        <input type="text" name="room" style="color: black" placeholder="Write the number">
                    </div>

                    <div style="padding: 15px">
                        <label>Doctor Image</label>
                        <input type="file" name="image" style="color: white">
                    </div>

                    <div style="padding: 15px">

                        <input type="submit" class="btn btn-success ">
                    </div>
                </form>

            </div>
        </div>

    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
