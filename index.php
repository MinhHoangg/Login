<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>All Product</title>
<meta name="description" content="Assignment 2">
<script src="html2canvas.min.js"></script>
<script src="chance.min.js"></script>
<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui-1.9.2.custom.min.js"></script>
<style type="text/css">
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}
.button5:hover {
  background-color: #555555;
  color: white;
}
table {
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #FFFFFF;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #DC143C;
  color: white;
}
.fixed{
  position: fixed;
  top: 0px;
  right: 0px;
}

* {
  box-sizing: border-box;
}

.content {

}
#start-btn {
 
}
.dust {
  position: absolute;
}
</style>
</head>
<div>
<body align = "center" background="img/pic.png">
<h1>List of all toy in the ATN Shop</h1>
<div class="fixed"><form class="w3-container" action="index.php" method="POST"><button class="button button5">Refresh</button></form></div>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db,"SELECT * FROM toy");
?>
<table align="center" id="customers">
	<tr><th align='center' width='200'>Name</th><th align='center' width='200'>Price ($)</th><th align='center' width='200'>Quantity</th><th align='center' width='200'>Image</th></tr>
</table>
<?php
echo "<table align='center' id='customers'>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['iname'] . "</td>";
echo "<td align='center' width='200'>" . $row['price'] . " $" . "</td>";
echo "<td align='center' width='200'>" . $row['quantity'] . "</td>";
echo "<td align='center' width='200'>";?><div class="content" id="start-btn"><img src="/<?php echo $row['image']; ?>" height="150" width="150"></div><?php "</td>";
echo "</tr>";}echo "</table>";?>
<div class="button button5"><button id="start-btn">Snap!</button></div>
</div>
<script> 
    var imageDataArray = [];
    var canvasCount = 35;
    $("#start-btn").click(function(){
      
      html2canvas($(".content")[0]).then(canvas => {
        //capture all div data as image
        ctx = canvas.getContext("2d");
        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        var pixelArr = imageData.data;
        createBlankImageData(imageData);
        //put pixel info to imageDataArray (Weighted Distributed)
        for (let i = 0; i < pixelArr.length; i+=4) {
          //find the highest probability canvas the pixel should be in
          let p = Math.floor((i/pixelArr.length) *canvasCount);
          let a = imageDataArray[weightedRandomDistrib(p)];
          a[i] = pixelArr[i];
          a[i+1] = pixelArr[i+1];
          a[i+2] = pixelArr[i+2];
          a[i+3] = pixelArr[i+3]; 
        }
        //create canvas for each imageData and append to target element
        for (let i = 0; i < canvasCount; i++) {
          let c = newCanvasFromImageData(imageDataArray[i], canvas.width, canvas.height);
          c.classList.add("dust");
          $("body").append(c);
        }
        //clear all children except the canvas
        $(".content").children().not(".dust").fadeOut(3500);
        //apply animation
        $(".dust").each( function(index){
          animateBlur($(this),0.8,800);
          setTimeout(() => {
            animateTransform($(this),100,-100,chance.integer({ min: -15, max: 15 }),800+(110*index));
          }, 70*index); 
          //remove the canvas from DOM tree when faded
          $(this).delay(70*index).fadeOut((110*index)+800,"easeInQuint",()=> {$( this ).remove();});
        });
      });
    });
    function weightedRandomDistrib(peak) {
      var prob = [], seq = [];
      for(let i=0;i<canvasCount;i++) {
        prob.push(Math.pow(canvasCount-Math.abs(peak-i),3));
        seq.push(i);
      }
      return chance.weighted(seq, prob);
    }
    function animateBlur(elem,radius,duration) {
      var r =0;
      $({rad:0}).animate({rad:radius}, {
          duration: duration,
          easing: "easeOutQuad",
          step: function(now) {
            elem.css({
                  filter: 'blur(' + now + 'px)'
              });
          }
      });
    }
    function animateTransform(elem,sx,sy,angle,duration) {
      var td = tx = ty =0;
      $({x: 0, y:0, deg:0}).animate({x: sx, y:sy, deg:angle}, {
          duration: duration,
          easing: "easeInQuad",
          step: function(now, fx) {
            if (fx.prop == "x") 
              tx = now;
            else if (fx.prop == "y") 
              ty = now;
            else if (fx.prop == "deg") 
              td = now;
            elem.css({
                  transform: 'rotate(' + td + 'deg)' + 'translate(' + tx + 'px,'+ ty +'px)'
              });
          }
      });
    }
    function createBlankImageData(imageData) {
      for(let i=0;i<canvasCount;i++)
      {
        let arr = new Uint8ClampedArray(imageData.data);
        for (let j = 0; j < arr.length; j++) {
            arr[j] = 0;
        }
        imageDataArray.push(arr);
      }
    }
    function newCanvasFromImageData(imageDataArray ,w , h) {
      var canvas = document.createElement('canvas');
          canvas.width = w;
          canvas.height = h;
          tempCtx = canvas.getContext("2d");
          tempCtx.putImageData(new ImageData(imageDataArray, w , h), 0, 0);
          
      return canvas;
    }
    </script>


</body>
</html>