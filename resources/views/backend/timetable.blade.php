@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Student Time Table</h4>
                </div>
                <div class="card-body">
                   
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered align-middle  text-nowrap custom-table m-0">
                               
                                <tr>
                                    <td align="center" height="50" width="100"><br>
                                        <b>Day/Period</b></br>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>I<br>9:30-10:20</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>II<br>10:20-11:10</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>III<br>11:10-12:00</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>12:00-12:40</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>IV<br>12:40-1:30</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>V<br>1:30-2:20</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>VI<br>2:20-3:10</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>VII<br>3:10-4:00</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Monday</b>
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">Che</td>
                                    <td rowspan="6" align="center" height="50">
                                        <h2>L<br>U<br>N<br>C<br>H</h2>
                                    </td>
                                    <td colspan="3" align="center" height="50">LAB</td>
                                    <td align="center" height="50">Phy</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Tuesday</b>
                                    </td>
                                    <td colspan="3" align="center" height="50">LAB
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">SPORTS</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Wednesday</b>
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">phy</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td colspan="3" align="center" height="50">LIBRARY
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Thursday</b>
                                    </td>
                                    <td align="center" height="50">Phy</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td colspan="3" align="center" height="50">LAB
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Friday</b>
                                    </td>
                                    <td colspan="3" align="center" height="50">LAB
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Phy</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Saturday</b>
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Mat</td>
                                    <td colspan="3" align="center" height="50">SEMINAR
                                    </td>
                                    <td align="center" height="50">SPORTS</td>
                                </tr>
                                   
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->
                   
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Container ends -->
    

@endsection
@section('scripts')

@endsection
