$(document).ready(function()
{
    var initSortable = function()
    {
        $('#blockList').sortable({trigger: '.sort-handle-1', selector: '.block-item', dragCssClass: ''});
        $('#blockList .children').sortable({trigger: '.sort-handle-2', selector: '.block-item', dragCssClass: ''});
    }
    
    computeParent();
    initSortable();
})
