<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }

    </style>
    <base href="/public">
    @include('admin.css')
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
            <div class="container" align="center" style="padding: 100px;">
                @if (session()->has('message'))
                <div class="alert alert-success">

                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert">
                        x
                    </button>

                </div>
                @endif
                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px">
                        <label>Doctor Name</label>
                        <input type="text" name="name" value="{{$data->name}}" style="color: black">
                    </div>

                    <div style="padding: 15px">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$data->phone}}" style="color: black">
                    </div>

                    <div style="padding: 15px">
                        <label>Specialty</label>
                        <input type="text" name="specialty" value="{{$data->specialty}}" style="color: black">
                    </div>

                    <div style="padding: 15px">
                        <label>Room No</label>
                        <input type="text" name="room" value="{{$data->room}}" style="color: black">
                    </div>

                    <div style="padding: 15px">
                        <label>Old Image</label>
                        <img width="70px" height="70px" src="doctorimage/{{$data->image}}">
                    </div>

                    <div style="padding: 15px">
                        <label>Change Image</label>
                        <input type="file" name="file">
                    </div>

                    <div style="padding: 15px">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>

            </div>


        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
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

