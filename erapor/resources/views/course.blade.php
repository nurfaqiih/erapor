@extends('app')

@section('content')
    <div class="container" ng-app="courseApp" ng-controller="courseController">
        <h1>Angular</h1>
        <div class="row">
            <div class="col-md-4">
                <input type="text" ng-model="course.name">
                <button class="btn btn-prymary" ng-click="create()">Create</button>
                <i class="fa fa-spinner fa-pulse" id="loading"></i>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <table class="table table-striped">
                    <tr ng-repeat='course in courses'>
                        <td><% course.name %></td>
                        <td><button class="btn btn-danger" ng-click="destroy($id)"><span class="glyphicon glyphicon-trash" ></span>Delete</button> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@stop