<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TodoList</title>
	
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="/bower_components/angular/angular.min.js"></script>
        <script src="/bower_components/lodash/lodash.min.js"></script>
        <script src="/bower_components/angular-route/angular-route.min.js"></script>
        <script src="/bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>
        <script src="/bower_components/restangular/dist/restangular.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('inc.navbar')
    <div class="container">
      @include('inc.messages')
      @yield('content')
    </div>

    <footer id="footer" class="text-center">
      <p>Copyright &copy; 2017 TodoList</p>
    </footer>
	        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
			<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js">
  </body>
</html>
