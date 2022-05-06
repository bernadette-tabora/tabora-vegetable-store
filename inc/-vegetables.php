 <div class="row">

     <?php
        $veges = get_vege();

        if (count($veges) > 0) :
        ?>

         <?php foreach ($veges as $vege) : ?>
             <div class="col-md-6 col-lg-4">
                 <div class="box">
                     <div class="img-box">
                         <img src="<?php echo IMG_URL . "/{$vege['vege_photo']}"; ?>" alt="">
                     </div>
                     <div class="detail-box">
                         <a href="#">
                             <?php echo $vege['vege_name']; ?>
                         </a>
                         <div class="price_box">
                             <h6 class="price_heading">
                                 <code class="fs-5"><?php echo $vege['vege_price']; ?></code> Pesos
                             </h6>
                         </div>
                     </div>
                 </div>
             </div>
         <?php endforeach; ?>

     <?php else : ?>
         <div class="alert text-center fs-2 text-secondary">No vegestables available</div>
     <?php endif; ?>


 </div>