import React from 'react';
import { motion } from 'framer-motion';
import { Eye, Calendar, ShieldCheck } from 'lucide-react';

interface ServiceCardProps {
  title: string;
  short_description: string;
  description: string;
  image: string;
  features?: string[];
  accentColor?: 'brand' | 'navy' | 'gold';
  onViewDetails: () => void;
  onBookNow: () => void;
}

const colorOverlays = {
  brand: 'from-brand-500/20 via-brand-500/5 to-transparent',
  navy: 'from-navy-500/20 via-navy-500/5 to-transparent',
  gold: 'from-gold-500/20 via-gold-500/5 to-transparent',
};

const colorBorders = {
  brand: 'border-brand-500/30 group-hover:border-brand-400/50',
  navy: 'border-navy-500/30 group-hover:border-navy-400/50',
  gold: 'border-gold-500/30 group-hover:border-gold-400/50',
};

export const ServiceCard: React.FC<ServiceCardProps> = ({
  title,
  short_description,
  description,
  image,
  features = [],
  accentColor = 'brand',
  onViewDetails,
  onBookNow,
}) => (
  <motion.div
    initial={{ opacity: 0, y: 40 }}
    whileInView={{ opacity: 1, y: 0 }}
    viewport={{ once: true, margin: '-30px' }}
    whileHover={{ y: -10 }}
    transition={{ duration: 0.5, ease: [0.25, 0.1, 0.25, 1] }}
    className="group relative overflow-hidden rounded-3xl h-[450px] sm:h-[500px] lg:h-[600px]"
    style={{ boxShadow: '0 20px 60px rgba(0,0,0,0.18)' }}
  >
    <div
      className="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-700 ease-out group-hover:scale-105"
      style={{ backgroundImage: `url(${image})` }}
    />

    <div className="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 via-40% to-black/10 transition-opacity duration-500 group-hover:opacity-90" />

    <div className={`absolute inset-0 bg-gradient-to-b ${colorOverlays[accentColor]} opacity-30`} />

    <div className="relative h-full flex flex-col justify-end p-5 sm:p-6 lg:p-8">
      <div className="space-y-2 sm:space-y-3 lg:space-y-4">
        <div className="flex flex-wrap gap-2">
          {features.slice(0, 3).map((f, i) => (
            <span
              key={i}
              className="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider"
              style={{
                background: 'rgba(255,255,255,0.1)',
                backdropFilter: 'blur(12px)',
                WebkitBackdropFilter: 'blur(12px)',
                border: '1px solid rgba(255,255,255,0.15)',
                color: 'rgba(255,255,255,0.9)',
              }}
            >
              <ShieldCheck className="w-2.5 h-2.5" />
              {f}
            </span>
          ))}
        </div>

        <h3 className="text-2xl sm:text-3xl font-black text-white font-display tracking-tight leading-tight">
          {title}
        </h3>

        <p className="text-sm text-gray-300 font-semibold uppercase tracking-wider">
          {short_description}
        </p>

        <p className="text-sm text-white/90 leading-relaxed line-clamp-2 font-body">
          {description}
        </p>

        <div className="flex gap-3 pt-2">
          <motion.button
            whileHover={{ scale: 1.03 }}
            whileTap={{ scale: 0.97 }}
            onClick={onViewDetails}
            className="flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold transition-all duration-200"
            style={{
              background: 'rgba(255,255,255,0.1)',
              backdropFilter: 'blur(12px)',
              WebkitBackdropFilter: 'blur(12px)',
              border: '1px solid rgba(255,255,255,0.2)',
              color: 'white',
            }}
          >
            <Eye className="w-3.5 h-3.5" />
            View Details
          </motion.button>

          <motion.button
            whileHover={{ scale: 1.03 }}
            whileTap={{ scale: 0.97 }}
            onClick={onBookNow}
            className="flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-white transition-all duration-200 shadow-lg"
            style={{
              background: 'linear-gradient(135deg, #2563eb, #1e40af)',
            }}
          >
            <Calendar className="w-3.5 h-3.5" />
            Book Now
          </motion.button>
        </div>
      </div>
    </div>
  </motion.div>
);
