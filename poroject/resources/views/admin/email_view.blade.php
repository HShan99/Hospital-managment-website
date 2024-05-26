<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <base href="/public">
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

                <form action="{{url('/send_email',$data->id)}}" method="POST">
                    @csrf
                    <div style="padding: 15px">
                        <label>Greeting</label>
                        <input type="text" name="greeting" style="color: black" required>
                    </div>

                    <div style="padding: 15px">
                        <label>Body</label>
                        <input type="text" name="body" style="color: black" required>
                    </div>


                    <div style="padding: 15px">
                        <label>Action Text</label>
                        <input type="text" name="actiontext" style="color: black" required>
                    </div>

                    <div style="padding: 15px">
                        <label>Action Url</label>
                        <input type="text" name="actionurl" style="color: black" required>
                    </div>

                    <div style="padding: 15px">
                        <label>End Part</label>
                        <input type="text" name="endpart" style="color: black" required>
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

