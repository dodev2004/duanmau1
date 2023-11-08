const reducer = document.querySelector(".quantity_reducer");
const increase = document.querySelector(".quantity_increase");
if(reducer && increase){
    const input = document.querySelector("input[name=quantity]");
    function quanTiTyReducer(){
        let sum  = parseInt(input.value);
        sum = sum > 0 ? --sum : 0;
        input.value = sum;
    }
    function quanTiTyIncrease(){
        let sum  = parseInt(input.value);
        sum = sum > 0 ? ++sum : 0;
        input.value = sum;
    }
    reducer.addEventListener("click",quanTiTyReducer);
    increase.addEventListener("click",quanTiTyIncrease);
}
const product_items = document.querySelectorAll(".product_content");
const product_descriptions = document.querySelectorAll(".product_midle-content");
const task = document.querySelector(".task_midle");
let widthState  = product_items[0].offsetWidth;
let leftSate = product_items[0].offsetLeft;
 task.style.left = `${leftSate}px`;
 task.style.width = `${widthState}px`;

product_items.forEach(function(product_item){
    product_item.onclick = function(){
       const item = this;
       const index  =this.dataset.index;
        const contents = document.querySelectorAll(".product_midle-content");
        contents.forEach(function(content){
            if(index == content.dataset.index){
                content.classList.remove("active")
                console.log(content)
            }
            else{
                content.classList.add("active")
            }
        })
      

       const width  = this.offsetWidth;
       const left = this.offsetLeft;
       task.style.width = `${width}px`;
        task.style.left = `${left}px`;
       
    }
})
