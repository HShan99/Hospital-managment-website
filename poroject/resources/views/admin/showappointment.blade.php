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
                    <th style=" padding: 10px; color:white;">Customer Name</th>
                    <th style=" padding: 10px; color:white;">Email</th>
                    <th style=" padding: 10px; color:white;">Phone</th>
                    <th style=" padding: 10px; color:white;">Doctor Name</th>
                    <th style=" padding: 10px; color:white;">Date</th>
                    <th style=" padding: 10px; color:white;">Message</th>
                    <th style=" padding: 10px; color:white;">Status</th>
                    <th style=" padding: 10px; color:white;">Approve</th>
                    <th style=" padding: 10px; color:white;">Cancel</th>
                </tr>
                @foreach ($data as $appoints)
                <tr style="background-color:rgb(14, 16, 17); padding-botton:10px;" align="center">
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->name}}</td>
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->email}}</td>
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->phone}}</td>
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->doctor}}</td>
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->date}}</td>
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->message}}</td>
                    <td style="padding: 10px; font-size:10px; color:white">{{$appoints->status}}</td>
                    <td><a class="btn btn-success btn-sm" href="{{url('/approved',$appoints->id)}}">Approved</a></td>
                    <td><a class="btn btn-danger btn-sm" href="{{url('')}}">Cancel</a></td></td>
                </tr>
                @endforeach

            </table>
        </div>





      </div>



    @include('admin.script')
  </body>
</html>
