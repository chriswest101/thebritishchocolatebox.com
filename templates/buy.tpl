
    <!-- Page Content -->
    <form name="createBox" id="createBox">
        <div class="content-section-a" style="padding-top: 60px;padding-bottom: 0px;">
    
            <div class="container txtcenter">
                {assign var="counter" value=1}
                {foreach from=$boxes key=key item=box}
                <label> 
                    <input type='radio' name='box_size' value='{$box.name}-{$box.max_items}' style="display: none;" class="radio_box_size">
                
                    <div class="inline">
                        <div>
                            <img class="img-responsive" src="{$box.image_path}" alt="">
                        </div>
                        <div class="txtcenter">
                            <hr class="section-heading-spacer" id="{$box.name}-{$box.max_items}">
                            <div class="clearfix"></div>
                            <h2 class="section-heading">{$box.name}</h2>
                        </div>
                    </div>
                </label> 
                {assign var="counter" value=$counter+1}
                {/foreach}
            </div>
            <!-- /.container -->
    
        </div> 
        
        <div style="position:relative;">
            <div class="content-section-a">
            
                <div class="container txtright">
                    <div>
                        <div class="progress">
                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="sr-only">Your Box is 0% full</span>
                          </div>
                        </div>
                        <input type="submit" value="Create Box" class="submitBtn" />
                    </div>
                </div>
            </div>
            
            {assign var="counter" value=1}
            {foreach from=$products key=key item=product}
                <div class="content-section-a">
            
                    <div class="container">
                        <div class="row">
                            <div class="floatright col-sm-6 txtcenter">
                                <img class="img-responsive" src="img/products/{$product.image_path}" width="150" alt="">
                                <input type="number" name="quantity" min="1" max="10" class="qty" value="1" >
                                <input type="hidden" name="product_code" value="{$product.product_code}" >
                                <a class="btn">Add To Box</a>
                            </div>
                            <div class="floatright col-sm-6">
                                <hr class="section-heading-spacer">
                                <div class="clearfix"></div>
                                <h2 class="section-heading">{$product.name}</h2>
                                <p class="lead">{$product.description}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.container -->
            
                </div>   
                
                {assign var="counter" value=$counter+1}
            {/foreach}
            
            <div class="content-section-a">
                <div class="container txtright">
                    <input id="boxID" type="text" />
                    <input id="boxLimit" type="text" />
                    <input id="boxSize" type="text" />
                    
                    <input type="submit" value="Create Box" class="submitBtn" />                    
                </div>
            </div>
            
            <div class="screen">
                <img class="img-responsive" src="img/start_here.png" alt="">
            </div>
              
        </div>
        
    </form>
        
