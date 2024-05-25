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
                        <th style=" padding: 10px; color:white;">Update</th>
                        <th style=" padding: 10px; color:white;">Delete</th>
                    </tr>

                  @foreach ($data as $doctors)
                    <tr style="background-color:rgb(14, 16, 17); padding-botton:10px;" align="center">
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->name}}</td>
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->phone}}</td>
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->specialty}}</td>
                        <td style="padding: 10px; font-size:10px; color:white">{{$doctors->room}}</td>
                        <td style="padding: 10px; font-size:10px; color:white"><img src="doctorimage/{{$doctors->image}}" width="75px" height="75px" ></td>
                        <td><a  href="{{url('/updatedoctor',$doctors->id)}}" class="btn btn-primary">Update</a></td>
                        <td><a onclick="return confirm('Are you sure to Delete this')" href="{{url('/deletedoctor',$doctors->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
