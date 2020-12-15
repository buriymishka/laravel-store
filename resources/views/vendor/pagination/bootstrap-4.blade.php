<?php
    function setUrl($url){
			$url = str_replace('?page=', '/', $url);
			$url = preg_replace('#/([1-9]+[0-9]*)/([1-9]+[0-9]*)#', '/$2/', $url);
			$url = str_replace('/1/', '', $url);
			$url = preg_replace('#/([1-9]+[0-9]*)/#', '/$1', $url);
			return ($url);
    }
?>
    <div class="pagination">
        <div class="items">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="page-item disabled item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="fa fa-angle-left"></i>
                </div>
            @else

                <a class="page-link item" href="{{ setUrl($paginator->previousPageUrl()) }}" rel="prev"
                   aria-label="@lang('pagination.previous')"><i class="fa fa-angle-left"></i></a>

            @endif

                 <?php
					if (count($elements) == 5){
						unset($elements['0']['2']);
						unset($elements['4']['9']);
                    }elseif(count($elements) == 3){
						if(isset($elements['0']['4'])){
							unset($elements['0']['4']);
                        }
						if(isset($elements['4']['6'])){
							unset($elements['4']['6']);
						}
						if(isset($elements['4']['7'])){
							unset($elements['4']['7']);
						}
                    }elseif(count($elements) === 1){
						if(count($elements[0]) == 7){
							unset($elements['0']['5']);
							unset($elements['0']['6']);
                        }elseif(count($elements[0]) == 6){
							unset($elements['0']['5']);
                        }
                    }
				?>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}

                {{-- Array Of Links --}}
                @if (is_array($element))

                    @foreach ($element as $page => $url)
                        <?php
                            $url = setUrl($url);



								?>
                        @if ($page == $paginator->currentPage())
                            <span class="page-link active item">{{ $page }}</span>
                        @else
                            <a class="page-link item" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                <a class="page-link item" href="{{ setUrl($paginator->nextPageUrl()) }}" rel="next"
                   aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>

            @else
                <div class="page-item item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="fa fa-angle-right"></i>
                </div>
            @endif
        </div>
    </div>

