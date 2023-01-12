<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY REMINDER</title>
    <script src="https://kit.fontawesome.com/9344ff345c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css
    ">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js" defer></script>
    <script src="js/myscript.js" defer></script>

</head>

<body>
    <div id="app">
        <div class="container">
            <header>
                <h1>MY REMINDER</h1>
                <div class="row row-cols-sm-auto g-3">
                    <div class="col-12">
                        <input type="text" class="form-control " v-model="input" placeholder="Things to remind..." @keyup.enter="add()">
                        <div class="form-text">Click Add or press Enter</div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" @click="add()">Add</button>
                    </div>
                </div>
            </header>
            <main class="my-5">
                <!-- TO DO title -->
                <div class="d-flex align-items-center gap-2">
                    <h3 class="d-inline m-0">TO DO</h3>
                    <!-- task left counter -->
                    <span class="badge bg-primary rounded-pill">{{ tasks.length }}</span>
                </div>
                <div class="form-text">Check to delete it (you can undo within 5s)</div>
                <!-- LIST GROUP -->
                <div class="row my-3">
                    <div class="col-5">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(task, index) in tasks">
                                <input class="form-check-input me-1" :id="'checkID-'+index" type="checkbox" v-model="tasks[index].done" @click="remove()">
                                <label class="form-check-label stretched-link" :for="'checkID-'+index">{{ task.text }}</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>

        </div>
    </div>

</body>

</html>