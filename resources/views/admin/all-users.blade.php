@extends('admin.layout')

@section('content')

<style type="text/css">
	// variables
// ============================================================

$colorForeground: #111;
$colorGray01: #20232a;
$colorGray02: rgb(146, 146, 146);
$colorGray03: #cccccc;
$colorGray04: #eeeeee;
$colorGray05: #f8f8f8;
$colorBackground: #fff;
$colorPrimary: #4B00F6;

// base
// ============================================================

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  background-color: $colorBackground;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
    Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
  overscroll-behavior-y: none;
}

a {
  text-decoration: none;
  color: $colorForeground;
}

select {
  font-family: inherit;
}

// utils
// ============================================================

.align-left {
  text-align: left;
}

.align-center {
  text-align: center;
}

.align-right {
  text-align: right;
}

.hidden {
  display: none;
}

.flex {
  display: flex;
}

.mb20 {
  margin-bottom: 20px;
}

// texts
// ============================================================

.light-text {
  color: $colorGray02;
}

// button
// ============================================================

.button {
  padding: 0 20px;
  line-height: 32px;
  border: 1px solid $colorForeground;
  border-radius: 3px;
  background-color: $colorForeground;
  font-size: 16px;
  color: $colorBackground;
  cursor: pointer;
  transition: all 0.2s;
  &:hover {
    background-color: $colorBackground;
    color: $colorForeground;
  }

  &.secondary {
    border: 1px solid $colorGray03;
    background-color: $colorBackground;
    color: $colorGray02;
    &:hover {
      border: 1px solid $colorForeground;
      background-color: $colorBackground;
      color: $colorForeground;
    }
  }
}

// heading
// ============================================================

.heading-lv1 {
  margin-bottom: 26px;
  font-size: 36px;
  font-weight: bold;
  color: $colorPrimary;
}

// dropdown
// ============================================================

.dropdown-heading {
  margin-bottom: 10px;
  font-size: 14px;
  color: $colorGray02;
}

.select {
  &::-ms-expand {
    display: none; /* delete browser picker */
  }
  appearance: none; /* delete browser picker */
  padding-top: 0;
  padding-left: 10px;
  padding-right: 40px;
  padding-bottom: 0;
  line-height: 2;
  background-color: $colorBackground;
  background-image: url(https://dl.dropbox.com/s/ru1dbh5omn3deeh/arrow.svg?dl=0);
  background-repeat: no-repeat;
  background-size: 10px 10px;
  background-position: right 15px center;
  border: 1px solid $colorGray03;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease-out;
  &:hover {
    border: 1px solid $colorGray02;
  }
  &:active,
  &:focus {
    outline: none;
    box-shadow: 0px 0px 0px 2px $colorPrimary;
  }
}

// layouts
// ============================================================

.container {
  max-width: 1000px;
  margin: 0 auto;
  padding-top: 20px;
  padding-left: 24px;
  padding-right: 24px;
}

// table
// ============================================================

.table-app {
  min-width: 700px;
}

.table-handler {
  margin-bottom: 16px;
  & > * {
    display: inline-block;
  }
}

.table-handler-dropdown-cell {
  padding-right: 16px;
}

.table-wrapper {
  height: 70vh;
  overflow-y: scroll;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table-head {
  line-height: 48px;

  th {
    position: sticky;
    top: 0px;
    background-color: $colorBackground;
    color: $colorPrimary;
    font-weight:bold;
    box-shadow: 0px 2px 0px 0px $colorPrimary;
  }
}

.table-row {
  line-height: 48px;
  color: $colorForeground;
  &:nth-child(even) {
    background-color: $colorGray05;
  }
  &:nth-child(odd) {
    background-color: $colorGray04;
  }
}

.table-cell {
  white-space: nowrap;
  padding: 0 10px;
  font-size: 14px;
}

.no-results {
  padding: 40px 0;
  text-align: center;
}

.no-results-message {
  font-size: 22px;
  color: $colorGray02;
}


</style>

	<body>

    <div class="container">
      <h1 class="heading-lv1"></h1>
        
        </div>
        <!-- /.table-handler -->

        <div class="table-wrapper">
          <table class="table" id="table">
            <thead>
              <tr class="table-head">
              	<th class="table-cell align-left">#</th>
                <th class="table-cell align-center">ID</th>
                <th class="table-cell align-center">Name</th>
                <th class="table-cell align-center">Rank</th>
                <th class="table-cell align-center">Coy</th>
                <th class="table-cell align-center">Joining Date</th>
                <th class="table-cell align-center">Cycle 1</th>
                <th class="table-cell align-center">Cycle 2</th>
                <th class="table-cell align-center">Cycle 3</th>
              </tr>
            </thead>

            <tbody>
               @php

               		$user = App\Models\User::where('type','=','user')
                    ->get();
                    $count = 1;

               @endphp 
               @foreach ($user as $u )
               		@php
               			//use another table to store cycle info
               			$userAssignment = App\Models\Assignment::where('sainik_id','=',$u->sainik_id)
                    		->latest()
                    		->first(); 
               		@endphp
               <tr class="table-head">
               	<td class="table-cell align-left">{{ $count }}</td>
                <td class="table-cell align-center">@if($u->sainik_id == '') - @endif{{ $u->sainik_id }}</td>
                <td class="table-cell align-center">{{ $u->name }}</td>
                <td class="table-cell align-center">@if($u->rank == '') - @endif{{ $u->rank }}</td>
                <td class="table-cell align-center">@if($u->coy_name == '') - @endif{{ $u->coy_name }}</td>
                <td class="table-cell align-center">@if($u->joining_date == '') - @endif{{ $u->joining_date }}</td>
                <td class="table-cell align-center">@if($userAssignment)  {{ $userAssignment->c1 }} @else - @endif</td>
                <td class="table-cell align-center">@if($userAssignment) {{ $userAssignment->c2 }} @else - @endif</td>
                <td class="table-cell align-center">@if($userAssignment) {{ $userAssignment->c3 }} @else - @endif</td>
              </tr>
              @php
              	$count++;
              @endphp
              @endforeach
              <!-- Loop -->
            </tbody>
          </table>

          <div class="no-results hidden" id="no-results">
            <p class="no-results-message">
              No results found.
            </p>
          </div>
          <!-- /#no-results -->
        </div>
        <!-- /.table-wrapper -->
      </div>
      <!-- /.table-app -->
    </div>
    <!-- /.container -->

    </body>
  

@endsection