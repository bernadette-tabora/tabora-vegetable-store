 <?php if (count($veges) > 0) : ?>
     <table class="table align-middle">
         <thead>
             <tr>
                 <th scope="col">#</th>
                 <th scope="col">Vege</th>
                 <th scope="col">Price</th>
                 <th scope="col">Action(s)</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($veges as $vege) : ?>
                 <tr>
                     <th scope="row"><?php echo $vege['id']; ?></th>
                     <td>
                         <div class="d-flex align-items-center">
                             <div class="avatar m-2">
                                 <img src="<?php echo IMG_URL . $vege['vege_photo']; ?>" alt="">
                             </div>
                             <span class="fw-bold text-success ms-2"><?php echo $vege['vege_name']; ?></span>
                         </div>
                     </td>
                     <td><code><?php echo $vege['vege_price']; ?></code></td>
                     <td>
                         <div>
                             <a href="?vege_id=<?php echo $vege['id']; ?>" class="btn btn-light"><i class="fa-solid fa-trash text-danger"></i></a>
                             <a href="add-new-vege.php?vege_id=<?php echo $vege['id']; ?>" class="btn btn-light"><i class="fa-solid fa-pencil"></i></a>
                         </div>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
         </tbody>
     </table>
 <?php else : ?>
     <div class="alert alert-info text-center">
         No vegetables added yet.
     </div>
 <?php endif; ?>