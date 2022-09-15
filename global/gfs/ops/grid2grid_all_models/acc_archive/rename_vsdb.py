import glob
import os


# acc_valid00Z_HGT_P500_fhr120_G002NHX.png
vsdb_image_list = glob.glob('images/*')
for vsdb_image in vsdb_image_list:
    vsdb_image_name = vsdb_image.split('/')[1]
    if 'dieoff' not in vsdb_image_name:
        stat = vsdb_image_name.split('_')[0]
        fday = vsdb_image_name.split('_')[1]
        var = vsdb_image_name.split('_')[2]
        level = vsdb_image_name.split('_')[3]
        region = vsdb_image_name.split('_')[4]
        valid = vsdb_image_name.split('_')[5]
        valid_hr = valid.split('Z')[0]
        valid_YYYYmm = valid.split('Z')[1].replace('.png', '')
        if stat == 'cor':
            emc_verif_global_name = 'acc'
        emc_verif_global_name = emc_verif_global_name+'_valid'+valid_hr+'Z_'+var+'_'+level+'_fhr'+str(int(fday.replace('day',''))*24).zfill(2)
        if region == 'G2NHX':
            emc_verif_global_name = emc_verif_global_name+'_G002NHX'
        emc_verif_global_name = emc_verif_global_name+'_'+valid_YYYYmm+'.png'
    else:
        stat = vsdb_image_name.split('_')[0].replace('dieoff','')
        var = vsdb_image_name.split('_')[1]
        level = vsdb_image_name.split('_')[2]
        region = vsdb_image_name.split('_')[3]
        valid = vsdb_image_name.split('_')[4]
        valid_hr = valid.split('Z')[0]
        valid_YYYYmm = valid.split('Z')[1].replace('.png', '')
        if stat == 'cor':
            emc_verif_global_name = 'acc'
        emc_verif_global_name = emc_verif_global_name+'_valid'+valid_hr+'Z_'+var+'_'+level+'_fhrmean'
        if region == 'G2NHX':
            emc_verif_global_name = emc_verif_global_name+'_G002NHX'
        emc_verif_global_name = emc_verif_global_name+'_'+valid_YYYYmm+'.png'
    os.system('mv '+vsdb_image+' images/'+emc_verif_global_name)
