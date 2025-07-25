<div class="container d-flex justify-content-center align-items-center py-4">
  <div class="col-md-6 border p-4 rounded bg-light shadow">
    <h3 class="text-center mb-4">Ask Your Question</h3>
    <form method="POST" action="./server/requests.php">
      
      <!-- Title -->
      <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Post Description</label>
        <input class="form-control" id="description" name="discription" rows="4" required></input>
      </div>

      <!-- Category Dropdown -->
      <div class="mb-3">
        <label for="category" class="form-label" >Category</label>
       <?php
       include ('category.php');
       ?>
      </div>

      <!-- Submit Button -->
      <div class="d-grid justify-content-center">
        <button type="submit" class="btn btn-outline-warning btn-sm text-dark fw-bold" name="ask">Ask Question</button>
      </div>
      
    </form>
  </div>
</div>
