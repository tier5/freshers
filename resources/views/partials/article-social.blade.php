<div class="row col-md-12 social-actions" id="article_div_{{$article->id}}">

            <div class='col-md-2' id="likes_section_{{$article->id}}">
                @if($article->like->where('user_id',Session::get('id'))->where('article_id',$article->id)->first()!=null)

                     <form action="#" method="POST" id="article_like_form_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </button>
                         <span id="article_div_like_{{$article->id}}"  > LIKES: {{ $article->likes }} | </span>
                    </form>
                    
                @else
                        <form action="#" method="POST" id="article_like_form_o_{{$article->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </button>
                            <span id="article_div_like_{{$article->id}}"> LIKES: {{ $article->likes }} | </span>
                        </form>

                @endif
            </div>
                    
                

                
               <div class='col-md-2' id="dislikes_section_{{$article->id}}">
                    @if($article->dislike->where('user_id',Session::get('id'))->where('article_id',$article->id)->first() !=null)
                    <form action="#" method="POST" id="article_dislike_form_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-dislike-{{$article->id}}" onclick="decrease_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-down"></i>
                        </button>
                        <span id="article_div_dislike_{{$article->id}}">DISLIKES: {{ $article->dislikes }} | </span>
                    </form>
                        


                @else
                    <form action="#" method="POST" id="article_dislike_form_o_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-dislike-{{$article->id}}" onclick="decrease_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-down"></i>
                        </button>
                        <span id="article_div_dislike_{{$article->id}}">DISLIKES: {{ $article->dislikes }} | </span>
                    </form>
                @endif
               </div>
                  
                <div class='col-md-2'>
                    <small>
                    <a href="/View/article/{{$article->id}}"><i class="fa fa-binoculars fa-border"></i></a> {{ $article->views }}|
                </small>
                </div>
             </div>  