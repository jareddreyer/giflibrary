<?php


//set URL of images *TODO: save to local storage and build form to manage JSON*
$json = array( "http://i.imgur.com/CP23j.gif","http://i.imgur.com/WFCbt.gif","http://i.imgur.com/To7B5.gif","http://replygif.net/i/687","http://cdn.memegenerator.net/instances/400x/20283806.jpg","http://24.media.tumblr.com/fe83bc06bec024fb4cb1654632d90d72/tumblr_mfwlv5GAGz1rlvywxo1_500.gif","http://i.imgur.com/ZDhmE.gif","http://media.tumblr.com/tumblr_lxptmqGLqF1qk9f0d.gif","http://i.imgur.com/sUPOA.gif","http://i.imgur.com/cjKrd.gif","http://i.imgur.com/tzkHo.gif","http://i.imgur.com/bb1Es.gif","http://i.imgur.com/RNOFx.gif","http://i.imgur.com/gUWLi.gif","http://i.imgur.com/LONYU.gif","http://i.imgur.com/efSbI.gif","http://i.imgur.com/DyJdV.gif","http://i.imgur.com/ga6p6.gif","http://i.imgur.com/m012X.gif","http://i.imgur.com/TRcXN.gif","http://i.imgur.com/lsxlW.gif","http://i.imgur.com/Wpdun.gif","http://i.imgur.com/Wwlc2.gif","http://i.imgur.com/NByH1.gif","http://i.imgur.com/8UBNv.gif","http://i.imgur.com/QzhiW.gif","http://i.imgur.com/3wH1j.gif","http://i.imgur.com/Ltz8m.gif","http://i.imgur.com/htvBC.gif","http://i.imgur.com/j6Ur8.gif","http://i.imgur.com/1RWzV.gif","http://i.imgur.com/hZA6J.gif","http://i.imgur.com/W6UMi.gif","http://i.imgur.com/pEx4G.gif","http://i.imgur.com/0sA9a.gif","http://i.imgur.com/Wpdun.gif","http://i.imgur.com/iA0yc.gif","http://i.imgur.com/Ase4I.gif","http://i.imgur.com/p68BD.gif","http://i.imgur.com/YuxKM.gif","http://i.imgur.com/q5wuf.gif","http://i.imgur.com/twks7.gif","http://i.imgur.com/Y6noR.gif","http://i.imgur.com/uWIBo.gif","http://i.imgur.com/8UBNv.gif","http://i.imgur.com/EjIFM.gif","http://i.imgur.com/ClR7r.gif","http://i.imgur.com/JRg3f.gif","http://i.imgur.com/4ii4K.gif","http://i.imgur.com/kkUPv.gif","http://i.imgur.com/cLsbd.gif","http://i.imgur.com/9aCyy.gif","http://i.imgur.com/M3JbH.gif","http://i.imgur.com/nEk36.gif","http://i.imgur.com/coZny.gif","http://i.imgur.com/eLOru.gif","http://i.imgur.com/OcJxo.gif","http://i.imgur.com/fe7Ad.gif","http://i.minus.com/i2RDiUNF8F7zx.gif","http://24.media.tumblr.com/tumblr_l9qjy5n6hn1qcnueyo1_500.gif","http://i.imgur.com/jumiD.gif","http://i.imgur.com/hJwiO.gif","http://i.imgur.com/aocjx.gif","http://i.imgur.com/2OrTG.gif","http://i.imgur.com/J04Vi.gif","http://25.media.tumblr.com/tumblr_ldqoxcmCd51qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_le825idbP91qe4tx4o1_400.gif","http://25.media.tumblr.com/tumblr_lcrf6fGqzD1qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_lbkxjsfSnS1qe4tx4o1_400.gif","http://25.media.tumblr.com/tumblr_lc6629Ka3Q1qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_lakkxoT09E1qe4tx4o1_400.gif","http://25.media.tumblr.com/tumblr_latq8mhmzd1qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_lak87pX9Dg1qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_laak35Nip41qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_lahv0bT0Q01qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_lbyldwmd5N1qe4tx4o1_400.gif","http://24.media.tumblr.com/tumblr_lbfsx8pn2h1qe4tx4o1_400.gif","http://i.imgur.com/O3SfjAI.gif","http://i.imgflip.com/fuy9.gif","http://i.imgur.com/SedyW.gif","http://25.media.tumblr.com/tumblr_m15gf9jK2k1r8058ko1_250.gif","http://i.imgur.com/LeaI7.gif","http://i.imgur.com/jcxiY.gif","http://i.imgur.com/FyibIXJ.gif","http://i.imgur.com/YHkU9.gif","http://i.imgur.com/e0T4a.gif","http://i.imgur.com/LqcMF.gif","http://i.imgur.com/9IZra.gif","http://i.imgur.com/oFn2p.gif","http://i.imgur.com/csk9A.gif","http://i.imgur.com/bAyRxfO.gif","http://i.imgur.com/niz8P.gif","http://i.imgur.com/AtR4LG5.gif","http://i.imgur.com/7w9haAh.gif","http://i.imgur.com/4JqNZf4.gif","http://i.imgur.com/h7Km8VD.gif","http://24.media.tumblr.com/39be68d97ac60599cb96a64a402cb934/tumblr_mh1tmkfWQL1rvolrvo1_500.gif","http://i.imgur.com/WH9MEH5.gif","http://i.imgur.com/jMtUkGm.gif","http://i.imgur.com/pzmS54O.gif","http://i.imgur.com/5MrqKnP.gif","http://30.media.tumblr.com/tumblr_lxi51zmQve1qa7gyjo4_250.gif","http://24.media.tumblr.com/tumblr_m7w0jzaqtJ1rwpc0uo6_400.gif","http://25.media.tumblr.com/05a248a008303ce0bf943f7e3c69d1c1/tumblr_mfu055TYaA1r0p7xuo1_500.gif","http://i.imgur.com/xDKEseg.gif","http://i.imgur.com/KnaSpop.gif","http://i.imgur.com/OnK23Vw.gif","http://i.imgur.com/ZNYY8Ud.gif","http://i.imgur.com/1fpHESd.gif","http://i.imgur.com/IDSywN3.gif","http://i.imgur.com/T4tNXxQ.gif","http://i.imgur.com/buwdkJ2.gif","http://i.imgur.com/YSpnmiz.gif","http://i.imgur.com/lz0CmHK.gif","http://i.imgur.com/GIq9L9x.gif","http://i.imgur.com/M9ZVlUi.gif","http://i.imgur.com/bw1jODt.gif","http://i.imgur.com/WlCXIa9.gif","http://i.imgur.com/L2vHY85.gif","http://i.imgur.com/IgMq8.gif","http://i.imgur.com/53ruzex.gif","http://i.imgur.com/BM4jn7D.gif","http://i.imgur.com/X79oAXJ.gif","http://i.imgur.com/X2QL0xj.gif","http://i.imgur.com/zFx6yHH.gif","http://i.imgur.com/s4CqqQp.gif","http://i.imgur.com/HCz3WfA.gif","http://i.imgur.com/Hgc057f.gif","http://i.imgur.com/xpXcFcW.gif","http://i.imgur.com/JvLpelg.gif","http://i.imgur.com/ooAmykE.gif","http://i.imgur.com/ZgSh4vC.gif","http://i.imgur.com/I9gh94s.gif","http://i.imgur.com/CMN8WqA.gif","http://i.imgur.com/LfSe5.gif","http://i.imgur.com/QRMfho7.gif","http://i.imgur.com/caCbL.gif","http://i.imgur.com/Cy4dbEj.gif","http://i.imgur.com/saM5o.gif","http://i.imgur.com/LUTst.gif","http://i.imgur.com/0mNSF.gif","http://i.imgur.com/Y7NEezH.gif","http://i.imgur.com/3G3bn2v.gif","http://i.imgur.com/vqXGZNW.gif","http://i.imgur.com/M1zNz.gif","http://i.imgur.com/raVCrtk.gif","http://i.imgur.com/bQQzJkd.gif","http://i.imgur.com/9K9vC6J.gif","http://i.imgur.com/44YD51K.gif","http://i.imgur.com/h9wIm3x.gif","http://i.imgur.com/CpEHeF1.gif","http://www.reactiongifs.com/wp-content/uploads/2012/02/hSbE0.gif","http://25.media.tumblr.com/tumblr_m4fp62mzwm1rwauf8o1_500.gif","http://i.imgur.com/pg0AkhD.gif","http://i.imgur.com/ddlN1no.gif","http://i.imgur.com/kPiqq.gif","http://i.imgur.com/0jlcxlF.gif","http://i.imgur.com/Jlb5YtM.gif","http://i.imgur.com/sOTnokI.gif","http://i.imgur.com/v6k7yWj.gif","http://i.imgur.com/ANUGPzw.gif","http://i.minus.com/iBCsWI8bhvrOG.gif","http://i.imgur.com/WdfgcF1.gif","http://i.imgur.com/Gz2vYlY.gif","http://i.imgur.com/0iPiOjT.gif","http://i.imgur.com/pqp9beQ.gif","http://i.imgur.com/R5KUwLN.gif","http://i.imgur.com/vbwM2Nt.gif","http://i.imgur.com/KiZqQtX.gif","http://i.imgur.com/PyCm2Cl.gif","http://i.imgur.com/gIUBwwH.gif","http://i.imgur.com/3lCLvCv.gif","http://i.imgur.com/KNh9J7W.gif","http://i.imgur.com/Nd20l.gif","http://i.imgur.com/EIPbi.gif","http://25.media.tumblr.com/tumblr_m0lv9khaOv1qbmajao1_500.gif","http://24.media.tumblr.com/tumblr_m63dryZfiO1ryd72ko1_500.gif","http://replygif.net/i/236.gif","http://i.imgur.com/C73q12U.gif","http://i.imgur.com/AcGiVpR.gif","http://i.imgur.com/vffGnJG.gif","http://i.imgur.com/ARdmKMs.gif","http://i.imgur.com/KZbpOXD.gif","http://i.imgur.com/fCgSbVu.gif","http://gifrific.com/wp-content/uploads/2012/09/Kanye-West-Shaking-Head-No.gif","http://media.tumblr.com/tumblr_lxxho8mH2n1qik0xh.gif","http://i.imgur.com/0OsMhuR.gif","http://i.imgur.com/me6IGsa.gif","http://i.imgur.com/t7nbQgV.gif","http://i.imgur.com/TvCg3sG.gif","http://i.imgur.com/ywWIr3W.gif","http://i.imgur.com/NZCVLu3.gif","http://i.imgur.com/NArq5oS.gif","http://i.imgur.com/Z7KRHeU.gif","http://i.imgur.com/2qcgCbp.gif","http://i.imgur.com/uBbAGd3.gif","http://i.imgur.com/klcQSc6.gif","http://i.imgur.com/MV8RyhE.gif","http://i.imgur.com/KgsnF4n.gif","http://i.imgur.com/SS0p0vK.gif","http://i.imgur.com/BRJsNa8.gif","http://i.imgur.com/9cznr4e.gif","http://i.imgur.com/YoDYjdI.gif","http://i.imgur.com/lwlgwEc.gif","http://i.imgur.com/cSB4jWw.gif","http://i.imgur.com/UBZBLU4.gif","http://i.imgur.com/EzNY6TY.gif","http://i.imgur.com/4t0Jc5o.gif","http://i.imgur.com/wRp1wdX.gif","http://media.tumblr.com/tumblr_m4hku4Rgb61qcqw4b.gif","http://25.media.tumblr.com/2f382d5c9b1938900ca2dcc75fcbe554/tumblr_mmcn8tHvUc1qc6k86o1_500.gif","http://i.imgur.com/6yPr7TV.gif","http://i.imgur.com/Z2acixb.gif","http://i.imgur.com/efyHZ2m.gif","http://i.imgur.com/AqgroKG.gif","http://i.imgur.com/AHhdDMa.gif","http://i.imgur.com/eZWnCjF.gif","http://i.imgur.com/gwVsVzd.gif","http://i.imgur.com/1NiXR5O.gif","http://i.imgur.com/uDvaUI1.gif","http://www.reactiongifs.com/wp-content/uploads/2013/07/bill.gif","http://i.imgur.com/7cRRG.gif","http://i.imgur.com/uxVQzvX.gif","http://i.imgur.com/IgLT5YP.gif","http://i.imgur.com/AkcGMr3.gif","http://i.imgur.com/Tq30dhJ.gif","http://i.imgur.com/NJtJSKY.gif","http://i.imgur.com/qdxyJ4T.gif","http://i.imgur.com/J7dPBSV.gif","http://i.imgur.com/27LTwYF.gif","http://i.imgur.com/vUv31Wk.gif","http://i.imgur.com/bXFG2SW.jpg","http://popcultureperversion.files.wordpress.com/2013/03/b1e8d586da4cf82adf79df9f1a45e7be.gif?w=490&h=302","http://i.imgur.com/aWTBzIv.gif","http://i.imgur.com/3Dlbq0l.gif","http://i.imgur.com/Fff86ka.gif","http://i.imgur.com/yCUCVjp.gif","http://i.imgur.com/b6JtZzO.gif","http://i.imgur.com/mzPAckI.gif","https://i.chzbgr.com/maxW500/7058937088/hD14BCC97/","http://i.imgur.com/3MZ2l.gif","http://i.imgur.com/vfp6zG9.gif","http://i.imgur.com/tqdzc8h.gif","http://i.imgur.com/Htpbf6n.gif","http://i.imgur.com/osljJiX.gif","http://www.reactiongifs.com/wp-content/uploads/2013/10/sht.gif","http://www.threadbombing.com/data/media/20/hoffing.gif","http://i.imgur.com/DriBw1E.gif","http://i.imgur.com/l5Aoia9.gif","http://www.reactiongifs.com/wp-content/uploads/2013/09/medal.gif","http://i.imgur.com/Pppku8S.gif","http://i.imgur.com/IyBPIOM.gif","http://i.imgur.com/AcN17wE.gif","http://i.imgur.com/M0KM3Pf.gif","http://i.imgur.com/C2YG9TV.gif","http://i.imgur.com/qi5Wxo7.gif","http://i.imgur.com/8XcLaez.gif","http://i.imgur.com/WTKziJv.gif","http://i.imgur.com/ikzAJgy.gif","http://i.imgur.com/7Wfd9s8.gif","http://i.imgur.com/qPJBXss.gif","http://replygif.net/i/885.gif","http://i.imgur.com/LChTIZl.gif","http://i.imgur.com/RwgY9FY.gif","http://i.imgur.com/E65CUI6.gif","http://i.imgur.com/A58Cs2y.gif","http://i.imgur.com/Lm8U1Bw.gif","http://i.minus.com/iEUnBtjGDKsyi.gif","http://imgur.com/xWKwDLG.gif","http://i.imgur.com/KP1v4hd.gif","http://i.imgur.com/DwznVGf.gif","http://i.imgur.com/Gfti5uZ.gif","http://i.imgur.com/jQ49wxX.gif","http://i.imgur.com/ZsDkyhC.gif","http://i.imgur.com/aktpocm.gif","http://i.imgur.com/CpIjw2B.gif","http://i.imgur.com/SEaQoGa.gif","http://i.imgur.com/vAbXCBV.gif","http://i.imgur.com/DqHvguR.gif","http://24.media.tumblr.com/0144a728dacef479d8bb349bbf8d306b/tumblr_mvn1kkxXlj1qe1pkvo2_500.gif","http://img.gawkerassets.com/img/19d5trc47czg4gif/ku-medium.gif","http://i.imgur.com/eCWk4JM.gif","http://i.imgur.com/A92Sz8d.gif","http://i.imgur.com/g14ySnT.jpg","http://i.imgur.com/2KsOo7t.gif","http://i.imgur.com/hAPDxlW.gif","http://i.imgur.com/da9LtpA.gif","http://i.imgur.com/Gr7yIXq.gif","http://i.imgur.com/sgsqhae.gif","http://i.imgur.com/bHkOTQc.gif","http://www.reactiongifs.com/r/f-yo-grapes.gif","http://www.reactiongifs.com/r/well.gif","http://www.reactiongifs.com/r/angtft.gif","http://i.imgur.com/HM6RTNR.gif","http://i.imgur.com/b1QBldC.gif","http://24.media.tumblr.com/tumblr_lvhr7dzyos1qzxhjjo1_500.gif","http://img.pandawhale.com/74489-jim-carrey-gif-what-the-hell-a-Ly3J.gif","http://i.imgur.com/oU8Whhn.gif","http://i.imgur.com/IJKMpqv.gif","http://i.imgur.com/Ghv0iJA.gif","http://i.imgur.com/hTnmMo8.gif","http://i.imgur.com/akUOxRL.gif","http://i.imgur.com/VCx24zT.gif","http://i.imgur.com/NgQr8Hz.gif","http://i.imgur.com/ZeKqPj5.gif","http://i0.kym-cdn.com/photos/images/original/000/748/638/afa.gif","http://i.imgur.com/PgicStu.gif","http://i.imgur.com/LBRVVPE.gif","http://i.imgur.com/BjvCjC8.gif","http://i.imgur.com/QDAlsKy.gif","http://i.imgur.com/lqKpe2E.gif","https://i.imgur.com/tRXgSJw.gif","http://i.imgur.com/rfz0hP0.gif","http://i.imgur.com/bvWVbbv.gif","http://i.imgur.com/QDAlsKy.gif","http://i.imgur.com/bIw4roY.gif","http://i.imgur.com/j06KTiK.gif","http://i.imgur.com/yiOKc3S.gif","http://i.imgur.com/eIYvDbb.gif","http://i.imgur.com/brubalL.gif","http://img.pandawhale.com/post-40676-do-not-google-that-phrase-gif-PqdF.gif","https://i.imgur.com/c732z.gif","http://i.imgur.com/vOkY2rN.gif");
$directory    = 'c:\\inetpub\\wwwroot\\Test\\gifs\\images'; //directory of gifs