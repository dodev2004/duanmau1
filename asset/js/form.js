const form = document.querySelector(".sign_up form");
if(form){
    const inputs = Array.from(form.querySelectorAll("input"));
    const submit = form.querySelector("input[name=submit]");
    const email = form.querySelector("input[type=email]")
    inputs.pop()
    inputs.forEach(input => {
        const erorMessage = input.parentElement.querySelector(".error_message");
        input.onblur = function(){
            let value = this.value;
            const message = checkNull(value);
            if(message){
                erorMessage.innerText= message;
            }
            else {
                erorMessage.innerText= message;
            }
        }
        input.oninput= function(){
            let value = this.value;
            const message = checkNull(value);
            if(message){
                erorMessage.innerText= message;
            }
            else {
                erorMessage.innerText= message;
            }
        }
    });
    const repeatPass = form.querySelector("input[name=r_password]");
    console.log(repeatPass)
    if(repeatPass){
        const erorMessage = repeatPass.parentElement.querySelector(".error_message");
        repeatPass.onblur = function(){
            let value = this.value;
            let message = checkNull(value);
            if(message){
                erorMessage.innerText= message;
            }
            else {
                erorMessage.innerText= message;
                 message = passwordExist(form.querySelector("input[name=password]").value,this.value);
                if(message){
                    erorMessage.innerText= message;
                }
                else {
                    erorMessage.innerText= message;
                }
            }
        }
    }
    let checked = true;
    form.onsubmit = function(){
 
        inputs.forEach(input =>{
            const erorMessage = input.parentElement.querySelector(".error_message");
            let value = input.value;
            let message = checkNull(value);
            if(message){
                erorMessage.innerText= message;
                checked = false
            }
            else {
                erorMessage.innerText= message;
             
            }
        })
        if(repeatPass){
            const erorMessage = repeatPass.parentElement.querySelector(".error_message");
                let value = repeatPass.value;
                let message = checkNull(value);
                if(message){
                    erorMessage.innerText= message;
                    checked = false
                }
                else {
                    erorMessage.innerText= message;
                    
                     message = passwordExist(form.querySelector("input[name=password]").value,value);
                    if(message){
                        erorMessage.innerText= message;
                        checked = false
                    }
                    else {
                        erorMessage.innerText= message;
                        checked = true
                    }
                }
            
        }
            return checked
    }  
}

const form1 = document.querySelector(".user_information")
if(form1){
    const inputs = form1.querySelectorAll(".input_infor");
    const edit = form1.querySelector("input[name=edit]");
    if(edit){
        edit.addEventListener("click",handleEdit);
        function handleEdit(){
            inputs.forEach(function(input){
                input.removeAttribute("disabled");
                input.style.backgroundColor = "white"
            })
        }

    } 
    form1.onsubmit = function(){
       
       if(inputs[0].getAttribute("disabled") !=null){
            alert("Không thể sửa");
            return false;  

       }
       else {
        alert("Sửa thành công");
        return true;
       }
        
        
       
            
        
    }
}

const table_cart = document.querySelector(".table_cart");
console.log(table_cart);
console.log(table_cart)
if(table_cart){
    const total_price = table_cart.querySelector(".total_price");
    const VND = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
      });
      let sum = 0 ;
  const quantitys = table_cart.querySelectorAll(".cart_quantity input");
  const prices =table_cart.querySelectorAll(".cart_price");
  quantitys.forEach(quantity=>{
    quantity.onchange = function(){
        const price = this.parentElement.parentElement.querySelector(".cart_price");
        const priceQuantity =this.parentElement.parentElement.querySelector(".cart_total-price");
        priceQuantity.innerText = VND.format(this.value * price.dataset.price);
        console.log(prices)
        prices.forEach(function(price,index){
          sum = sum + quantitys[index].value * price.dataset.price
        })
        total_price.innerText = VND.format(sum);
      
    }
  })
  
}
const bill = document.querySelector(".form_bill");
if(bill){
    const inputs =Array.from(bill.querySelectorAll(".input_infomation"));
  
    inputs.forEach(input =>{
        const erorMessage = input.parentElement.querySelector(".error_message");
        console.log(input)
       input.onblur = function(){
        let value = this.value;
        const message = checkNull(value);
        if(message){
            erorMessage.innerText= message;
        }
        else {
            erorMessage.innerText= message;
        }
        
       }
       input.oninput= function(){
        let value = this.value;
        const message = checkNull(value);
        if(message){
            erorMessage.innerText= message;
        }
        else {
            erorMessage.innerText= message;
        }
    }

    })
  
    bill.onsubmit = function(){
        let checked = true;
        inputs.forEach(input =>{
            const erorMessage = input.parentElement.querySelector(".error_message");
            console.log(erorMessage);
            let value = input.value;
            let message = checkNull(value);
            if(message){
                erorMessage.innerText= message;
                checked = false
            }
            else {
                erorMessage.innerText= message;
            }
        })    
        if(!JSON.parse(sessionStorage.getItem("user"))){
            checked = false;
            alert("Vui lòng đăng ký tài khoản để có thể mua hàng");
        }
        
            return checked;
    }  
}
function checkNull(data){
    return data.trim() == "" ? "Vui lòng nhập trường này" : "";
}
function passwordExist(password,data){
    return data.trim() == password.trim() ? "" : "Mật khẩu không trùng khớp";
}

const seach_category = document.querySelector(".seach_category");
if(seach_category){
  const categorys = document.querySelector(".list_danhMuc");
  const lists = categorys.querySelectorAll("li");
  const length = lists.length
  const show_category =  seach_category.querySelector(".show_category span");
  const input = seach_category.querySelector("input");
    
 
  seach_category.onclick = function(){
    categorys.classList.toggle("active")
    if(document.querySelector(".list_danhMuc.active")){
        categorys.style.height = `${lists[0].offsetHeight * length}px`
    }
    else {
        categorys.style.height = ``
    }
  }
  lists.forEach(function(list){
        list.onclick = function(){
            const data = this.dataset.category;
            const id = this.dataset.id;
            show_category.innerText = data;
            input.setAttribute("value",id)
            categorys.classList.toggle("active")
        }
        
  })
}
