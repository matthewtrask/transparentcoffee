<div class="row posts">
    <div class="small-12 medium-12 large-12 columns">
        <h1>SCRPI</h1>

        <ul class="breadcrumbs">
            <li><a href='<?php echo DIR;?>admin'>Admin</a></li>
            <li>Manage Scrpi</li>
        </ul>

        <?php echo \helpers\session::pull('message');?>

        <div class="row">
            <div class="small-3 columns">
                <p><a href='<?php echo DIR;?>admin/scrpi/add' class='button'>Add Scrpi Post</a></p>
            </div>
            <div class="small-3 columns">
                <p><a href='#' data-reveal-id="docUpload" class='button'>Upload Scrpi Spanish</a></p>
            </div>
            <div class="small-6 columns">
            </div>
        </div>
        <table class='table table-striped table-hover table-bordered responsive'>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            if($data['posts']){
                foreach($data['posts'] as $row){
                    echo "<tr>";
                    echo "<td>$row->postTitle</td>";
                    echo "<td>$row->catTitle</td>";
                    echo "<td>".date('jS M Y H:i:s', strtotime($row->postDate))."</td>";
                    echo "<td>
				<a href='".DIR."admin/scrpi/edit/$row->postID'>Edit</a>
				<a href=\"javascript:delpost('$row->postID','$row->postTitle');\">Delete</a>
				</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

    <div class="row">
        <div class="small-10 columns">
            <?php echo $data['page_links']; ?>
        </div>
    </div>

</div>

<div id="docUpload" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Spanish SCRPI Post</h2>
    <input type="file" name="doc" />
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
