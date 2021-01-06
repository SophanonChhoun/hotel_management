@extends('admin.layout.default')

@section("content")
<style>.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px black;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  
  .card-counter.warning{
    background-color: #FFCC00;
    color: #FFF;
  }  
  .card-counter.secondary{
    background-color: #f542e6;
    color: #FFF;
  }  
  .card-counter.orange{
    background-color: #d96d16;
    color: #FFF;
  }  
  .card-counter.siliver{
    background-color: #737d7b;
    color: #FFF;
  }  
  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }</style>

            <div class="">
                <div class="row">        
                <div class="col-md-3">
                  <div class="card-counter success">
                   <i class="fa fa-key"></i>
                    <span class="count-numbers">  {{$room_available }}</span>
                    <a href="admin/booking/create" style="color:white;"><span class="count-name">Available Room</span></a>
                  </div>
                </div>
            
                <div class="col-md-3">
                  <div class="card-counter warning">
                    <i class="fa fa-calendar"></i>
                    <span class="count-numbers">
                      {{ $check_in }}</span>
                    <span class="count-name">Check-In</span>
                  </div>
                </div>
            
                <div class="col-md-3">
                  <div class="card-counter danger">
                    <i class="fa fa-usd"></i>
                    <span class="count-numbers">{{ $check_out }}</span>
                    <span class="count-name">Check-Out</span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card-counter info">
                    <i class="fa fa-bookmark"></i>
                    <span class="count-numbers">
                     {{ $room_booked }}  </span>
                    <span class="count-name">Room Booked</span>
                  </div>
                </div>
              </div>
              <div class="">
                <div class="row">
                  
                <div class="col-md-3">
                 
                  <div class="card-counter primary">
                   <i class="fa fa-home"></i>
                    <span class="count-numbers">  {{$total_room }}</span>
                    <a href="admin/rooms/list" style="color:white;"><span class="count-name">Room</span></a>
                  </div>
                </div>
            
                <div class="col-md-3">
                  <div class="card-counter siliver">
                    <i class="fa fa-archive"></i>
                    <span class="count-numbers">
                      {{ $room_type }}</span>
                      <a href="admin/room_type/list" style="color:white;"><span class="count-name">Room Type</span></a>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card-counter orange">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="count-numbers">{{ $customer_today }}</span>
                    <a href="admin/customer/list" style="color:white"><span class="count-name">New Customers</span></a>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card-counter secondary">
                    <i class="fa fa-money"></i>
                    <span class="count-numbers">
                        {{$payment_today }}</span>
                   <a href="admin/payment/list" style="color:white"><span class="count-name">Payment</span></a>
                  </div>
                </div>
              </div>
            <h1 class="p-3 mb-2 text-white">Recently Booking</h1>
            <table class="table table-responsive table-bordered "  id="table_id">
              <tr>
                <th>ID</th>
                  <th>Customer</th>
                  <th>Hotel</th>
                  <th>Booking Type</th>
                  <th>Check in</th>
                  <th>Check out</th>
                  <th>Status</th>
                  <th colspan="2">Action</th>
              </tr>
              <div class="col-md-5"></div>
              @forelse($data as $booking)
                  <tr>
                    <td>{{ $booking->id }}</td>
                      <td><a href=" admin/booking/list">{{ $booking->customer->last_name ?? null }} {{ $booking->customer->first_name ?? null }}</a></td>
                      <td>{{ $booking->hotel->name }}</td>
                      <td>{{ $booking->booking_type->name }}</td>
                      <td>{{ $booking->check_in_date }}</td>
                      <td>{{ $booking->check_out_date }}</td>
                      <td>
                          <input type="checkbox" data-toggle="modal" data-target="#status{{ $booking->id }}" @if($booking->is_enable) checked @endif>
                          @include("admin.booking.status")
                      </td>
                      <td><a href="/admin/booking/show/{{ $booking->id }}" class="btn btn-warning">Edit</a></td>
                      <td>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $booking->id }}">Delete</button>
                          @include('admin.booking.delete')
                      </td>
                      @empty
                          <td colspan="5" class="text-center">There is no value</td>
                  </tr>
              @endforelse
          </table>

                 <div id='calendar'></div>

@endsection


<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($booking) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,
            })
        });
</script>



