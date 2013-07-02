/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function TodoCtrl($scope) {
  $scope.todos = [
    {text:'Photo with Del Piero', done:true},
    {text:'CouchSurfing', done:false},
    {text:'Skydiving', done:true},
    {text:'Adopt an orphan', done:false}];

  $scope.addTodo = function() {
    $scope.todos.push({text:$scope.todoText, done:false});
    $scope.todoText = '';
  };

  $scope.remaining = function() {
    var count = 0;
    angular.forEach($scope.todos, function(todo) {
      count += todo.done ? 0 : 1;
    });
    return count;
  };

  $scope.archive = function() {
    var oldTodos = $scope.todos;
    $scope.todos = [];
    angular.forEach(oldTodos, function(todo) {
      if (!todo.done) $scope.todos.push(todo);
    });
  };
}

