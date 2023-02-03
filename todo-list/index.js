var Express = require('express');
var app = Express();

const PORT = process.env.PORT || 3001;

var todos = [
    {
        id: 1,
        name: 'todo1'
    },
    {
        id: 2,
        name: 'todo2'
    },
    {
        id: 3,
        name: 'todo3'
    },
    {
        id: 4,
        name: 'todo4'
    },
    {
        id: 5,
        name: 'todo5'
    }
]

app.get('/todo', function (req, res) {
    res.json(todos);
});

app.get('/todo/:id', function (req, res) {
    var id = parseInt(req.params.id);
    var result;

    todos.forEach(function (todo) {
        if (id == todo.id) {
            result = todo;
        }
    })
    res.json(result);
});

app.get('/todo/list/:id1-:id2', function (req, res) {
    var id1 = parseInt(req.params.id1);
    var id2 = parseInt(req.params.id2);
    var indexStart;
    var indexOfId2;
    var result;

    todos.forEach(function (todo) {
        if (id1 == todo.id) {
            indexStart = todos.indexOf(todo);
        }

        if (id2 == todo.id) {
            indexEnd = todos.indexOf(todo)
        }
    })

    result = todos.slice(indexStart, indexEnd);
    res.json(result);
});

app.listen(PORT, function () {
    console.log('Server i running.....');
})