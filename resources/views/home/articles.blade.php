<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Articles</h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">
               @foreach ($articles as $article)
        <tr>
           
        <div class="col-md-4">
    <div>
        <img src="/images/{{ $article->image }}" class="services_img">
    </div>
    <td>{{ $article->id }}</td>
    <td>{{ $article->title }}</td>
    <td>{{ $article->description }}</td>
    <td>{{ $article->category->name }}</td>
    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
</div>
           
        </tr>
        @endforeach
                  <!-- <div class="col-md-4">
                     <div><img src="images/img-1.png" class="services_img"></div>
                     <div class="btn_main"><a href="#">Rafting</a></div>
                  </div>
                  <div class="col-md-4">
                     <div><img src="images/img-2.png" class="services_img"></div>
                     <div class="btn_main active"><a href="#">Hiking</a></div>
                  </div>
                  <div class="col-md-4">
                     <div><img src="images/img-3.png" class="services_img"></div>
                     <div class="btn_main"><a href="#">Camping</a></div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>