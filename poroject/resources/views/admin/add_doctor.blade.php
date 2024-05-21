<!DOCTYPE html>
<html lang="en">
  <head>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
      <div class="p-0 m-0 row proBanner" id="proBanner">
        <div class="p-0 m-0 col-md-12">

        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->


        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top:100px">

                @if (session()->has('message'))
                <div class="alert alert-success">

                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert">
                        x
                    </button>

                </div>
                @endif

                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px">
                        <label>Doctor Name</label>
                        <input type="text" name="name" style="color: black" placeholder="Write the name" required>
                    </div>

                    <div style="padding: 15px">
                        <label>Phone Number</label>
                        <input type="text" name="phone" style="color: black" placeholder="Write the number" required>
                    </div>

                    <div style="padding: 15px">
                        <label>Speciality</label>
                        <select name="specialty" style="color: black; width:200px" required>
                            <option>--Select--</option>
                            <option value="Skin" name="specialty">Skin</option>
                            <option value="Hart" name="specialty">Hart</option>
                            <option value="Head" name="specialty">Head</option>
                            <option value="Eye" name="specialty">Eye</option>
                        </select>
                    </div>

                    <div style="padding: 15px">
                        <label>Room Number</label>
                        <input type="text" name="room" style="color: black" placeholder="Write the number" required>
                    </div>

                    <div style="padding: 15px">
                        <label>Doctor Image</label>
                        <input type="file" name="image" style="color: white" required>
                    </div>

                    <div style="padding: 15px">

                        <input type="submit" class="btn btn-success ">
                    </div>
                </form>

            </div>
        </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
