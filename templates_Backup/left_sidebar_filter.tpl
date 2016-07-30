<section class="mobileSideBarHeader">
    <input type="button" value="Close Filter" onclick="$('.mobileSideBar').toggle();" class="mobileSideBarButton" />
</section>

<!-- Excerpts -->
<section>
    <form action="products.php" method="post" onsubmit="showLoader();">
        <section>
			<p>
				Search by category
			</p>
		</section>
		<ul class="divided">
        
            {foreach from=$categories key=key item=category}
            <li>
                <article class="box excerpt">
            
                    {*<header>
						<h3><a href="#">{$category.name}</a></h3>
					</header>*}
                    
                    <p>
                        <input type="checkbox" name="category[{$category.name}]" id="{$category.name}" class="css-checkbox" value="{$category.name}" {if isset($selected[$manufacture.name])}checked="" style="background-position: 0 -35px;"{/if} />
                        <label for="{$category.name}" class="css-label radGroup1" style="border:none;">{$category.name}</label>
					</p>
                    
            	</article>
			</li>
            {/foreach}
        </ul>
        
        <section>
			<p>
				Search by Manufacturer
			</p>
		</section>
        
        <ul class="divided">
        
            {foreach from=$manufacturers key=key item=manufacture}
            <li>
                <article class="box excerpt">
            
                    {*<header>
						<h3><a href="#">{$manufacture.name}</a></h3>
					</header>*}
                    
                    <p>
                        <input type="checkbox" name="manufacturers[{$manufacture.name}]" id="{$manufacture.name}" class="css-checkbox" value="{$manufacture.name}" {if isset($selected[$manufacture.name])}checked="" style="background-position: 0 -35px;"{/if} />
                        <label for="{$manufacture.name}" class="css-label radGroup1" style="border:none;">{$manufacture.name}</label>
					</p>
                    
            	</article>
			</li>
            {/foreach}
        </ul>
        
        <section>
            <input type="submit" name="filterProducts" value="Update" />
            <a href="products">Clear All</a>
        </section>
        
    </form>
</section>