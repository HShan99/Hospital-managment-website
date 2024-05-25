<!DOCTYPE html>
<html lang="en">
  <head>
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
            <div align="center" style="padding-top: 100px;">
                <table>
                    <tr  style="background-color: black;">

                        <th style=" padding: 10px; color:white;">Doctor Name</th>
                        <th style=" padding: 10px; color:white;">Phone</th>
                        <th style=" padding: 10px; color:white;">Specialty</th>
                        <th style=" padding: 10px; color:white;">Room No</th>
                        <th style=" padding: 10px; color:white;">Image</th>
                    </tr>

                    @foreach ($data as $doctors)
                    <tr style="background-color:rgb(14, 16, 17); padding-botton:10px;" align="center">
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->name}}</td>
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->phone}}</td>
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->spacialty}}</td>
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->phone}}</td>
                    </tr>
                    @endforeach
                </table>


    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
