<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Class</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main class="container my-5">
    <div class="bg-light p-5 rounded">
      <h2 class="fw-bold fs-2 mb-5">Add Class</h2>
      <form action="{{route('classes.store')}}" method="POST" class="px-md-5">
        @csrf
        <div class="mb-3 row">
          <label for="className" class="col-md-2 col-form-label fw-bold text-md-end">Class Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="Enter class name" class="form-control" name="className" id="className" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="capacity" class="col-md-2 col-form-label fw-bold text-md-end">Capacity:</label>
          <div class="col-md-10">
            <input type="number" placeholder="Enter capacity" class="form-control" name="capacity" id="capacity" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="isFulled" class="col-md-2 col-form-label fw-bold text-md-end">Is Fulled:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" name="isFulled" id="isFulled" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="price" class="col-md-2 col-form-label fw-bold text-md-end">Price:</label>
          <div class="col-md-10">
            <input type="number" step="0.1" placeholder="Enter price" class="form-control" name="price" id="price" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="timeFrom" class="col-md-2 col-form-label fw-bold text-md-end">Time From:</label>
          <div class="col-md-10">
            <input type="time" class="form-control" name="timeFrom" id="timeFrom" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="timeTo" class="col-md-2 col-form-label fw-bold text-md-end">Time To:</label>
          <div class="col-md-10">
            <input type="time" class="form-control" name="timeTo" id="timeTo" />
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn btn-secondary text-white fs-5 fw-bold py-2 px-md-5">Add Class</button>
        </div>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>