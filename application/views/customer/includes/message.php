<style>
    #messageBox .alert,#exceptionBox .alert,#notificationBox .alert {
        margin-bottom:0px;
    }
</style>
<script language="javascript">
    function fadeMessage(msgDivId)
    {
        $(msgDivId).fadeOut('slow');
    }
</script>
<?php
if (isset($_SESSION['message']))
{
   
    $message = $_SESSION['message'];
   
    unset($_SESSION['message']);
    ?>
    <div id="messageBox">
        <div class="alert alert-success " role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times text-white mr-2" aria-hidden="true"></i></button>
        <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> <?php echo $message ?> </div>
    </div>

    <script language="javascript">
        setTimeout("fadeMessage('#messageBox')", 10000);
    </script>
    <?php
}
else if (isset($_SESSION['exception']))
{
    $exception = $_SESSION['exception'];
    unset($_SESSION['exception']);
    ?>
    <div id="exceptionBox">
        <div class="alert alert-danger " role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times text-white mr-2" aria-hidden="true"></i></button>
        <i class="fa fa-frown-o mr-2" aria-hidden="true"></i> <?php echo $exception ?> </div>
    </div>

    <script language="javascript">
        setTimeout("fadeMessage('#exceptionBox')", 10000);
    </script>
    <?php
}

if (isset($_SESSION['notification']))
{
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']);
    ?>
    <div id="notificationBox">
        <div class="alert alert-primary " role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times text-white mr-2" aria-hidden="true"></i></button>
        <i class="fa fa-bell-o mr-2" aria-hidden="true"></i> <?php echo $notification ?> </div>
    </div>
    <script language="javascript">
        setTimeout("fadeMessage('#notificationBox')", 10000);
    </script>
    <?php
}


?>