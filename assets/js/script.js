$(document).ready(function(){

  var imageThumbnails = ['Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg',
  'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
  'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
  'Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg','Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg',
  'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
  'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
  'Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg']
  var thumbnailsCode = "";
  imageThumbnails.forEach(thumbnail =>{
      thumbnailsCode +=`
      <div class="col-lg-2 col-sm-2 col-xs-6 d-block p-0">
      <div class="card m-1 p-1">

      <span class="badge badge-secondary d-block">Featured</span>

        <img src="/assets/images/${thumbnail}" class="card-img-top image" alt="...">
        <div class="middle">
            <a href="#">
                <div class="text"> Login</div>
            </a>
        </div>
      </div>
      </div>
      `;
  });

  $('#thum-section').html(thumbnailsCode);

})

var imageThumbnails = ['Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg',
'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
'Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg','Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg',
'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
'Big-Apple-Wins-720x540.png', 'Bombs-Away.jpg', 'Booming-Bananas.jpg',
'Arcane-Elements-1.png', 'asia-wins.png', 'Baby-Bloomers.jpg']
