/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function supr(nom, lid){
                if(confirm("Voulez vous vraiment supprimer "+nom+"?")){
                    document.location.href="?sup="+lid;
                }
            }